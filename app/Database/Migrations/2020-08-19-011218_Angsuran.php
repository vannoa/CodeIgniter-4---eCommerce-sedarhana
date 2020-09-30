<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Angsuran extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_angsuran'          => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'id_katagori_pinjaman' => [
				'type'           => 'INT',
				'constraint'     => '11',
			],
			'id_profil'          => [
				'type'              => 'INT',
				'constraint'        => '11',
			],
			'tgl_pembayaran' => [
				'type'           => 'DATE',
				'null'           => TRUE,
			],
			'angsuran_ke' => [
				'type'              => 'INT',
				'constraint'        => '11',
			],
			'besar_angsuran' => [
				'type'              => 'INT',
				'constraint'        => '11',
			],


		]);
		$this->forge->addKey('id_angsuran', TRUE);
		$this->forge->createTable('angsuran');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
