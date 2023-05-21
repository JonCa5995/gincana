<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Gincana extends Entity
{
	protected $attributes = [
		'id' => null,
		'ds_gincana' => null,
		'estado' => 'creado',
		'fc_inicio' => null,
		'fc_fin' => null,
		'created_at' => null,
		'updated_at' => null,
		'deleted_at' => null,
	];
    protected $datamap = [
		 'ds_gincana' => 'dsGincana',
		 'fc_inicio' => 'fcInicio',
		 'fc_fin' => 'fcFin',
	 ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at', 'fc_inicio', 'fc_fin'];
    protected $casts   = [
		 'id' => 'integer',
		 'dsGincana' => 'string',
		 'estado' => 'string',
	 ];
}
