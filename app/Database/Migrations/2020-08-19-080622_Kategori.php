<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_kategori' => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'nama_pinjaman'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'besaran_pinjaman'       => [
				'type'           => 'INT',
				'constraint'     => '11',
			]


		]);
		$this->forge->addKey('id_kategori', TRUE);
		$this->forge->createTable('kategori');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
