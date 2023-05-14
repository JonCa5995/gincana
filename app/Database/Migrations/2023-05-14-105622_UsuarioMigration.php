<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsuarioMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
			  'id',
			  'nombre' => [
				  'type' => 'VARCHAR',
				  'constraint' => '50',
				  'null' => false,
			  ],
			  'apellidos' => [
				  'type' => 'VARCHAR',
				  'constraint' => '50',
				  'null' => false,
			  ],
			  'usuario' => [
				  'type' => 'VARCHAR',
				  'constraint' => '32',
				  'null' => false,
			  ],
			  'clave' => [
				  'type' => 'VARCHAR',
				  'constraint' => '255',
				  'null' => false,
			  ],
			  'rol' => [
				  'type' => 'ENUM',
				  'constraint' => ["admin","usuario"],
				  'null' => false,
				  'default' => 'usuario',
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
		  $this->forge->createTable('usuario', false, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('usuario');
    }
}
