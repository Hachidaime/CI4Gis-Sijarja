<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class System extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'						=> 'INT',
				'constraint'			=> 11,
				'unsigned'				=> TRUE,
				'auto_increment'	=> TRUE
			],
			'slug' => [
				'type'						=> 'VARCHAR',
				'constraint'			=> '50',
			],
			'name' => [
				'type'						=> 'VARCHAR',
				'constraint'			=> '50',
			],
			'sort' => [
				'type'						=> 'INT',
				'constraint'			=> 11,
				'unsigned' => TRUE,
			],
			'created_at' => [
				'type'						=> 'datetime',
				'null'						=> TRUE,
			],
			'updated_at' => [
				'type'						=> 'datetime',
				'null'						=> TRUE,
			],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('system');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('system');
	}
}
