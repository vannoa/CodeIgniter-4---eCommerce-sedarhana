<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profil extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_profil'          => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'alamat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'tgl_lhr' => [
				'type'           => 'DATE',
				'null'           => TRUE,
			],
			'tmp_lhr' => [
				'type'           => 'DATE',
				'null'           => TRUE,
			],


		]);
		$this->forge->addKey('id_profil', TRUE);
		$this->forge->createTable('profil');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
