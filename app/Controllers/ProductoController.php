<?php

namespace App\Controllers;
use App\Models\Producto;

class ProductoController extends BaseController
{
    public function index(): string
    {
        $Producto=new Producto();
        $datos["productos"]=$Producto->findAll();
        $datos['header'] = view("Layouts/header");
        $datos['footer'] = view("Layouts/footer");
        return view('Producto/Listar',$datos);

        //$Producto=new Producto();
        //$datos["productos"]=$Producto->where("status","Pendiente")->findAll();
        //return view('Averias/listar',$datos);
    }

    public function crear(){
        $Producto= new Producto();
        $datos['header']=view('Layouts/header');
        $datos['footer']=view('Layouts/footer');
        return view('Producto/Crear',$datos);
    }
    public function guardar(){
        $Producto= new Producto();
        $datos=[
        "nombre"=>$this->request->getVar("nombre"),
        "marca"=>$this->request->getVar("marca"),
        "categoria"=>$this->request->getVar("categoria")
        ];
        $Producto->insert($datos);
        return redirect()->to(base_url('productos'));

    }

}