<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GincanaMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
			  'id',
			  'ds_gincana' => [
				  'type' => 'VARCHAR',
				  'constraint' => '50',
				  'null' => false,
			  ],
			  'estado' => [
				  'type' => 'ENUM',
				  'constraint' => ["creado","iniciado", "finalizado"],
				  'null' => false,
				  'default' => 'creado',
			  ],
			  'fc_inicio' => [
				  'type' => 'DATETIME',
				  'null' => true,
			  ],
			  'fc_fin' => [
				  'type' => 'DATETIME',
				  'null' => true,
			  ],
			  'created_at' => [
				  'type' => 'TIMESTAMP',
				  'null' => false,
			  ],
			  'updated_at' => [
				  'type' => 'TIMESTAMP',
				  'null' => true,
			  ],
			  'deleted_at' => [
				  'type' => 'TIMESTAMP',
				  'null' => true,
			  ],
		  ]);
		  $this->forge->createTable('gincana', false, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('gincana');
    }
}
