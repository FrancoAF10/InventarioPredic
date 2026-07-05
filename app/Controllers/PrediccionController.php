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

    $script = ROOTPATH . "python/predictor.py";
    $comando = "python " . escapeshellarg($script) . " " . escapeshellarg($idProducto);

    $output = shell_exec($comando);

    $Producto = new Producto();
    $datos["productos"] = $Producto->findAll();

    $datos['header'] = view("Layouts/header");
    $datos['footer'] = view("Layouts/footer");

    $datos['prediccion'] = trim($output);

    return view("Predic/Prediccion", $datos);
}

}