<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Simpanan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_simpanan'          => [
				'type'           => 'INT',
				'constraint'     => '11',
				'auto_increment' => TRUE
			],
			'nama_simpanan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'id_profil'          => [
				'type'           => 'INT',
				'constraint'     => '11',
			],
			'tgl_simpanan' => [
				'type'           => 'DATE',
				'null'           => TRUE,
			],
			'besar_simpanan' => [
				'type'              => 'INT',
				'constraint'        => '11',
			],


		]);
		$this->forge->addKey('id_simpanan', TRUE);
		$this->forge->createTable('simpanan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
