<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Movimientos;
use App\Models\Producto;

class DashboardController extends BaseController
{
    public function index(){
        $Producto= new Producto();
        $datos["productos"]=$Producto->findAll();
        $datos['header'] = view("Layouts/header");
        $datos['footer'] = view("Layouts/footer");

        return view("Dashboard",$datos);
    }

        public function getDataInformeMovimiento()
        {
            $this->response->setContentType("application/json");

            $movimiento = new Movimientos();

            $producto = $this->request->getGet('producto');
            $mes = $this->request->getGet('mes');
            $anio = $this->request->getGet('anio');

            $data = $movimiento->ventasPorProducto($producto, $mes, $anio);

            if (empty($data)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No se encontraron datos',
                    'resumen' => []
                ]);
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Datos obtenidos correctamente',
                'resumen' => $data
            ]);
        }
}
