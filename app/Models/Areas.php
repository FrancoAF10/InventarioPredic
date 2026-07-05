<?php

namespace App\Models;
use CodeIgniter\Model;

class Areas extends Model{

//Configurar 3 parámetros
//1. Nombre de la tabla
protected $table = 'areas';

//2. Clave primaria
protected $primaryKey = 'idarea';

//3. Campos operar
protected $allowedFields = ['area','idsucursal'];


    /**
     *  Obtiene el listado completo de áreas
     * 
     * Consulta la vista 'mostrar_areas' que contiene la información
     * de todas las áreas registradas en el sistema.
     * 
     * @return array Arreglo de registros con la información de las áreas
     */
    public function Vista_Areas(){
      $query =$this->db->query("SELECT * FROM mostrar_areas");
      return $query->getResultArray();
    }
}