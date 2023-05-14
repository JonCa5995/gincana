<?php

namespace App\Validation;

use Config\Database;

class UniqueRules
{
	/**
	 * Comprueba si el campo es único si una otra columna es nula.
	 * Si no se indica la columna a comprobar si es nulo, se asume que es 'deleted_at'.
	 *
	 * @param string|null $str Valor del campo.
	 * @param string $field Campos a comprobar
	 * @return bool True si el valor es único, false si no lo es.
	 */
	public function unique_null(?string $str, string $field): bool
	{
		[$field, $nullField] = array_pad(
			explode(',', $field),
			2,
			null
		);
		
		$nullField = empty($nullField) ? 'deleted_at' : $nullField;
		
		sscanf($field, '%[^.].%[^.]', $table, $field);
		
		$row = Database::connect($data['DBGroup'] ?? null)
			->table($table)
			->select('1')
			->where($field, $str)
			->where($nullField . ' IS NULL')
			->limit(1);
		
		return $row->get()->getRow() === null;
	}
}
