<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuarios extends Seeder
{
    public function run()
    {
        $data=[
            [ 
                "nombreusuario"=> "Gian Franco",
                "claveacceso"=> password_hash("franco123@", PASSWORD_DEFAULT),
                "idcontrato"=>1
            ]
        ];

        //insertar en la tabla
        $this->db->table("usuarios")->insertBatch($data);
    }
}