<?php

namespace App\Models;
use CodeIgniter\Model;

class Producto extends Model{

//Configurar 3 parámetros
//1. Nombre de la tabla
protected $table = 'producto';

//2. Clave primaria
protected $primaryKey = 'id_producto';

//3. Campos operar
protected $allowedFields = ['nombre','marca','categoria'];


    /**
     *  Obtiene el listado completo de los Productos
     * 
     * @return array Arreglo de registros con la información de los productos
     */

}