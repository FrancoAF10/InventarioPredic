<?php

namespace App\Controllers;
use App\Models\Producto;

class PrediccionController extends BaseController
{
    public function index(): string
    {
        $Producto=new Producto();
        $datos["productos"]=$Producto->findAll();
        $datos['header'] = view("Layouts/header");
        $datos['footer'] = view("Layouts/footer");
        return view('Predic/Prediccion',$datos);
    }
public function predecir()
{
    $idProducto = $this->request->getPost('id_producto');

    $movimiento = new \App\Models\Movimientos();
    $ventas = $movimiento->ventasMensualesPorProducto($idProducto);

    $Producto = new Producto();
    $datos["productos"] = $Producto->findAll();
    $datos['header'] = view("Layouts/header");
    $datos['footer'] = view("Layouts/footer");

    if (count($ventas) < 3) {
        $datos['prediccion'] = "No hay suficientes datos para predecir (mínimo 3 meses de historial).";
        return view("Predic/Prediccion", $datos);
    }

    // Tomar los últimos 3 meses
    $ultimos3 = array_slice($ventas, -3);
    $valoresUltimos3 = array_map(fn($v) => (float) $v['ventas'], $ultimos3);

    $promedio = array_sum($valoresUltimos3) / count($valoresUltimos3);

    $ultimo = (float) end($ventas)['ventas'];
    $penultimo = (float) $ventas[count($ventas) - 2]['ventas'];
    $tendencia = $ultimo - $penultimo;

    $prediccion = $promedio + ($tendencia * 0.5);

    $datos['prediccion'] = round($prediccion, 2);

    return view("Predic/Prediccion", $datos);
}

}