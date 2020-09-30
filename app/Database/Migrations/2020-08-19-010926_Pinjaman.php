<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pinjaman extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pinjaman'          => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'nama_pinjaman'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'id_profil'          => [
				'type'           => 'INT',
				'constraint'     => '11',
			],
			'besar_pinjaman'       => [
				'type'           => 'INT',
				'constraint'     => '11',
			],
			'tgl_pinjaman'       => [
				'type'           => 'INT',
				'constraint'     => '11',
			],
			'tgl_pelunasan'       => [
				'type'           => 'INT',
				'constraint'     => '11',
			],
			'id_angsuran'          => [
				'type'           => 'INT',
				'constraint'     => '11',
			],


		]);
		$this->forge->addKey('id_pinjaman', TRUE);
		$this->forge->createTable('pinjaman');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
