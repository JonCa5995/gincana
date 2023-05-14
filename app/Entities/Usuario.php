<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Usuario extends Entity
{
	protected $attributes = [
		'id' => null,
		'nombre' => null,
		'apellidos' => null,
		'nombre_completo' => null, // 'nombre' + 'apellidos
		'usuario' => null,
		'clave' => null,
		'rol' => 'usuario',
		'created_at' => null,
		'updated_at' => null,
		'deleted_at' => null,
	];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
		 'id' => 'integer',
		 'nombre' => 'string',
		 'apellidos' => 'string',
		 'nombre_completo' => 'string',
		 'usuario' => 'string',
		 'clave' => 'string',
		 'rol' => 'string',
	 ];
	
	/**
	 * Establece la clave del usuario encriptada.
	 * @param string $clave Palabra clave del usuario.
	 * @return void
	 */
	 public function setClave(string $clave)
	 {
		 $this->attributes['clave'] = password_hash($clave, PASSWORD_DEFAULT);
	 }
	 
	 /**
	  * Valida la clave del usuario.
	  * @param string $clave Palabra clave del usuario.
	  * @return bool True si la clave es correcta, false en caso contrario.
	  */
	 public function validarClave(string $clave): bool
	 {
		 return password_verify($clave, $this->attributes['clave']);
	 }
	 
	 /**
	  * Devuelve el nombre completo del usuario.
	  * El nombre completo se compone del nombre y los apellidos.
	  * @return string Nombre completo del usuario.
	  */
	 public function getNombreCompleto(): string
	 {
		 return $this->attributes['nombre'] . ' ' . $this->attributes['apellidos'];
	 }
}
