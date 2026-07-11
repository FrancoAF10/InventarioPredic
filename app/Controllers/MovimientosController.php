<?php

namespace App\Controllers;
use App\Models\Movimientos;
use App\Models\Producto;
use App\Models\Zona;
use App\Models\Stock;
use PhpOffice\PhpSpreadsheet\IOFactory;


class MovimientosController extends BaseController
{
    public function index(): string {
    $Movimiento = new Movimientos();

    $mes  = $this->request->getGet('mes');
    $anio = $this->request->getGet('anio');

        $datos = [
            'movimiento'       => $Movimiento->listarMovimientos($mes, $anio),
            'mesActual'        => $mes,
            'anioSeleccionado' => $anio, 
            'header'           => view("Layouts/header"),
            'footer'           => view("Layouts/footer"),
        ];

        return view('Movimiento/Listar', $datos);
    }

    public function crear()
    {
        $Producto= new Producto();
        $Zona=new Zona();
        $datos['header']=view('layouts/header');
        $datos['footer'] =view('layouts/footer');
        $datos['productos']=$Producto->findAll();
        $datos['zona']=$Zona->findAll();
        return view('movimiento/crear', $datos);
    }

    public function guardar() {
        $Movimiento = new Movimientos();
        $Stock = new Stock();
        $db = \Config\Database::connect();

        // 1. Validar datos de entrada
        $tipo      = $this->request->getPost('tipo');
        $idProducto = $this->request->getPost('id_producto');
        $idZona    = $this->request->getPost('id_zona');
        $cantidad  = (int) $this->request->getPost('cantidad');
        $observacion = $this->request->getPost('observacion');

        if (!$tipo || !$idProducto || !$idZona || $cantidad <= 0) {
            return redirect()->back()->with('error', 'Datos inválidos o incompletos.');
        }

        if (!in_array($tipo, ['INGRESO', 'SALIDA'])) {
            return redirect()->back()->with('error', 'Tipo de movimiento no válido.');
        }

        // 2. Verificar stock ANTES de guardar el movimiento
        $stock = $Stock->where('id_producto', $idProducto)
                    ->where('id_zona', $idZona)
                    ->first();

        if ($tipo == 'SALIDA') {
            if (!$stock) {
                return redirect()->back()->with('error', 'No existe stock para realizar la salida.');
            }
            if ($stock['cantidad'] < $cantidad) {
                return redirect()->back()->with('error', 'Stock insuficiente.');
            }
        }

        // 3. Usar transacción para consistencia
        $db->transStart();

            $Movimiento->insert([
                'fecha'       => date('Y-m-d H:i:s'),
                'tipo'        => $tipo,
                'id_producto' => $idProducto,
                'id_zona'     => $idZona,
                'cantidad'    => $cantidad,
                'observacion' => $observacion
            ]);

            if ($stock) {

                if ($tipo == 'INGRESO') {

                    $Stock->where('id_producto', $idProducto)
                        ->where('id_zona', $idZona)
                        ->set('cantidad', 'cantidad + ' . $cantidad, false)
                        ->update();

                } else {

                    $Stock->where('id_producto', $idProducto)
                        ->where('id_zona', $idZona)
                        ->set('cantidad', 'cantidad - ' . $cantidad, false)
                        ->update();

                }

            } else {

                $Stock->insert([
                    'id_producto' => $idProducto,
                    'id_zona'     => $idZona,
                    'cantidad'    => $cantidad
                ]);

            }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Error al guardar el movimiento.');
        }

        return redirect()->to(base_url('movimiento'))->with('success', 'Movimiento registrado correctamente.');
    }

    public function importar()
    {
        $archivo = $this->request->getFile('archivo_excel');

        if (!$archivo->isValid() || $archivo->hasMoved()) {
            return redirect()->back()->with('error', 'Archivo inválido.');
        }

        // Validar extensión
        $ext = $archivo->getClientExtension();
        if (!in_array($ext, ['xlsx', 'xls'])) {
            return redirect()->back()->with('error', 'Debe subir un archivo Excel (.xlsx o .xls).');
        }

        $rutaTemp = $archivo->getTempName();

        try {
            $spreadsheet = IOFactory::load($rutaTemp);
            $hoja = $spreadsheet->getActiveSheet();
            $filas = $hoja->toArray(null, true, true, true); // filas con letras de columna (A, B, C...)
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo leer el archivo: ' . $e->getMessage());
        }

        $movimientoModel = new Movimientos();
        $productoModel   = new Producto();
        $zonaModel       = new Zona();

        $registrosOk   = 0;
        $erroresFilas  = [];
        $dataInsertar  = [];

        // Suponiendo que la fila 1 es encabezado: fecha | tipo | codigo_producto | zona | cantidad | observacion
        foreach ($filas as $numFila => $fila) {
            if ($numFila == 1) continue; // saltar encabezado
            if (empty($fila['A'])) continue; // fila vacía

            $fecha        = trim($fila['A']);
            $tipo         = strtoupper(trim($fila['B']));
            $codProducto  = trim($fila['C']);
            $zonaNombre   = trim($fila['D']);
            $cantidad     = (int) $fila['E'];
            $observacion  = trim($fila['F'] ?? '');

            // Validaciones básicas
            if (!in_array($tipo, ['INGRESO', 'SALIDA'])) {
                $erroresFilas[] = "Fila $numFila: tipo inválido ($tipo)";
                continue;
            }

            // Buscar id_producto según código
            $producto = $productoModel->where('id_producto', $codProducto)->first();
            if (!$producto) {
                $erroresFilas[] = "Fila $numFila: producto '$codProducto' no encontrado";
                continue;
            }

            // Buscar id_zona según nombre
            $zona = $zonaModel->where('id_zona', $zonaNombre)->first();
            if (!$zona) {
                $erroresFilas[] = "Fila $numFila: zona '$zonaNombre' no encontrada";
                continue;
            }

            if ($cantidad <= 0) {
                $erroresFilas[] = "Fila $numFila: cantidad inválida";
                continue;
            }

            // Convertir fecha Excel a formato datetime si viene como número serial
            $fechaFormateada = $this->convertirFecha($fecha);

            $dataInsertar[] = [
                'fecha'       => $fechaFormateada,
                'tipo'        => $tipo,
                'id_producto' => $producto['id_producto'],
                'id_zona'     => $zona['id_zona'],
                'cantidad'    => $cantidad,
                'observacion' => $observacion,
            ];

            $registrosOk++;
        }

        // Insertar todo en batch (mucho más eficiente que uno por uno)
        if (!empty($dataInsertar)) {
            $movimientoModel->insertBatch($dataInsertar);
        }

        $mensaje = "$registrosOk movimientos importados correctamente.";
        if (!empty($erroresFilas)) {
            $mensaje .= " Errores: " . implode(' | ', $erroresFilas);
        }

        return redirect()->to('movimiento')->with('mensaje', $mensaje);
    }

    private function convertirFecha($valor)
    {
        // Si viene como número serial de Excel
        if (is_numeric($valor)) {
            $fechaObj = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($valor);
            return $fechaObj->format('Y-m-d H:i:s');
        }
        // Si viene como texto tipo "2026-07-01"
        return date('Y-m-d H:i:s', strtotime($valor));
    }

}