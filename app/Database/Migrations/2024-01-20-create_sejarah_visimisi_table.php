<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSejarahVisiMisiTable extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id' => [
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => true,
        'auto_increment' => true,
      ],
      'judul' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
      ],
      'tipe' => [
        'type' => 'ENUM',
        'constraint' => ['sejarah', 'visimisi'],
      ],
      'konten' => [
        'type' => 'TEXT',
      ],
      'gambar' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
      ],
      'created_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ],
      'updated_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ]
    ]);

    $this->forge->addKey('id', true);
    $this->forge->createTable('sejarah_visimisi');
  }

  public function down()
  {
    $this->forge->dropTable('sejarah_visimisi');
  }
}
