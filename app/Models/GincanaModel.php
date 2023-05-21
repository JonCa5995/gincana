<?php

namespace App\Models;

use App\Entities\Gincana;
use CodeIgniter\Model;

class GincanaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'gincana';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Gincana::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
		 'ds_gincana',
		 'estado',
		 'fc_inicio',
		 'fc_fin',
	 ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
		 'ds_gincana' => 'required|min_length[3]|max_length[50]',
		 'estado' => 'required|in_list[creado,iniciado,finalizado]',
		 'fc_inicio' => 'permit_empty|valid_date',
		 'fc_fin' => 'permit_empty|valid_date',
	 ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
