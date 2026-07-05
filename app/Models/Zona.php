<?php

namespace App\Models;
use CodeIgniter\Model;

class Zona extends Model{

//Configurar 3 parámetros
//1. Nombre de la tabla
protected $table = 'zona';

//2. Clave primaria
protected $primaryKey = 'id_zona';

//3. Campos operar
protected $allowedFields = ['nombre','descripcion'];


    /**
     *  Obtiene el listado completo de Zonas
     * 
     * @return array Arreglo de registros con la información de las Zonas
     */
    

}