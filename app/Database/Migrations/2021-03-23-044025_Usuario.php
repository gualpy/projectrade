<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuario extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'nombre'       => [
					'type'       => 'VARCHAR',
					'constraint' => '90',
			],
			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '90',
			],
			'deposito'       => [
				'type'       => 'DECIMAL',
				'constraint' => '2',
			],
			'retiro'       => [
				'type'       => 'decimal',
				'constraint' => '2',
			],	
			'password'       => [
				'type'       => 'VARCHAR',
				'constraint' => '90',
			],
			'create_at'       => [
				'type'       => 'DATETIME',
				'null' 		 => 'true',
			],
			'update_at'       => [
				'type'       => 'VARCHAR',
				'null' 		 => 'true',
			],
			
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('tblUsuario',TRUE);
	}

	public function down()
	{
		//
	}
}
