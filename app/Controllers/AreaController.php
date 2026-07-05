<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Areas;
use App\Models\Cargos;
class AreaController extends BaseController
{
      /**
       * Muestra la pantalla principal con el Dashboard: areas, cargos
       * @return string
       */
      public function index(){
        $areas = new Areas();
        $cargos = new Cargos();

        $datos['listarareas'] = $areas->Vista_Areas();
        $datos['listarcargos'] = $cargos->Vista_Cargos();

        $datos['header'] = view("Layouts/header");
        $datos['footer'] = view("Layouts/footer");

        return view('dashboard', $datos);
    }

}
