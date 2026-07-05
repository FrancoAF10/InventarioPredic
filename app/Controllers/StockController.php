<?php

namespace App\Controllers;
use App\Models\Stock;

class StockController extends BaseController
{
    public function index(): string
    {
        $Stock=new Stock();
        $datos["stock"]=$Stock->listarStock();
        $datos['header'] = view("Layouts/header");
        $datos['footer'] = view("Layouts/footer");
        return view('Stock/Listar',$datos);

        //$Producto=new Producto();
        //$datos["productos"]=$Producto->where("status","Pendiente")->findAll();
        //return view('Averias/listar',$datos);
    }



}