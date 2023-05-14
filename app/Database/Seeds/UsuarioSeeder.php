<?php

namespace App\Database\Seeds;

use App\Entities\Usuario;
use App\Models\UsuarioModel;
use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
		 $usuario = new Usuario([
			 'nombre' => 'Trovaor',
			 'apellidos' => 'Errante',
			 'clave' => '123456',
		 ]);
		 
		 $model = new UsuarioModel();
		 
		 $model->save($usuario);
		 
		 print_r($model->errors());
    }
}
