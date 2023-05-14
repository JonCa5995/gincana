<?php

namespace App\Models;

use App\Entities\Usuario;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usuario';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Usuario::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
		 'nombre',
		 'apellidos',
		 'usuario',
		 'clave',
		 'rol',
	 ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
		 'nombre' => 'required|min_length[3]|max_length[50]',
		 'apellidos' => 'required|min_length[3]|max_length[50]',
		 'usuario' => 'permit_empty|regex_match[/[\w\-.À-ÿ]+/]|min_length[3]|max_length[32]|unique_null[usuario.usuario,deleted_at]',
		 'clave' => 'required|min_length[6]|max_length[255]',
		 'rol' => 'required|in_list[admin,usuario]',
	 ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['setUser'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
	 
	 protected function setUser($data) {
		 if (empty($data['data']['usuario'])) {
			 helper('text');
			 $usuario = substr($data['data']['nombre'], 0, 3)
				 			. substr($data['data']['apellidos'], 0, 3);
			 
			 if ($userName = $this->where('usuario', $usuario)
				 					->orWhere("usuario rlike '^".$usuario."_[[:digit:]]+$'")
				 					->orderBy('usuario', 'DESC')->first()) {
				 $usuario = increment_string($userName->usuario);
			 }
			 
			 $data['data']['usuario'] = $usuario;
		 }
		 return $data;
	 }
}
