<?php

namespace App\Models;
use CodeIgniter\Model;

class Movimientos extends Model{

//Configurar 3 parámetros
//1. Nombre de la tabla
protected $table = 'Movimiento';

//2. Clave primaria
protected $primaryKey = 'id_movimiento';

//3. Campos operar
protected $allowedFields = ['fecha','tipo','id_producto','id_zona','cantidad','observacion'];


    /**
     *  Obtiene el listado completo de movimientos
     * 
     * @return array Arreglo de registros con la información de los movimientos
     */
        public function listarMovimientos($mes = null, $anio = null)
        {
            $builder = $this->select('
                    movimiento.fecha,
                    movimiento.tipo,
                    producto.nombre AS producto,
                    zona.nombre AS zona,
                    movimiento.cantidad,
                    movimiento.observacion
                ')
                ->join('producto', 'producto.id_producto = movimiento.id_producto')
                ->join('zona', 'zona.id_zona = movimiento.id_zona');

            if ($mes) {
                $builder->where('MONTH(movimiento.fecha)', $mes);
            }

            if ($anio) {
                $builder->where('YEAR(movimiento.fecha)', $anio);
            }

            return $builder->orderBy('movimiento.fecha', 'DESC')->findAll();
        }
    public function ventasPorProducto($producto = null, $mes = null, $anio = null)
        {
            $builder = $this->db->table('movimiento m');

            $builder->select('
                p.nombre AS producto,
                SUM(m.cantidad) AS total_vendido
            ');

            $builder->join('producto p', 'p.id_producto = m.id_producto');
            $builder->where('m.tipo', 'SALIDA');

            if (!empty($producto)) {
                $builder->where('m.id_producto', $producto);
            }

            if (!empty($mes)) {
                $builder->where('MONTH(m.fecha)', $mes);
            }

            if (!empty($anio)) {
                $builder->where('YEAR(m.fecha)', $anio);
            }

            $builder->groupBy('m.id_producto, p.nombre');

            return $builder->get()->getResultArray();
}
}