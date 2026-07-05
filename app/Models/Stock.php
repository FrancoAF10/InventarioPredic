<?php

namespace App\Models;
use CodeIgniter\Model;

class Stock extends Model{

//Configurar 3 parámetros
//1. Nombre de la tabla
protected $table = 'stock';

//2. Clave primaria
protected $primaryKey = 'id_stock';

//3. Campos operar
protected $allowedFields = ['id_producto','id_zona','cantidad'];


    /**
     *  Obtiene el listado completo del Stock
     * 
     * @return array Arreglo de registros con la información del Stock
     */

    public function listarStock(){
        return $this->select('producto.nombre AS producto, zona.nombre AS zona, stock.cantidad')
                    ->join('producto', 'producto.id_producto = stock.id_producto')
                    ->join('zona', 'zona.id_zona = stock.id_zona')
                    ->findAll();
    }

}