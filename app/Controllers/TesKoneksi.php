<?php
namespace App\Controllers;

class TesKoneksi extends BaseController
{
    public function index()
    {
        try {
            $db = \Config\Database::connect();
            // Coba query sederhana ke salah satu tabel, misal 'berita'
            $query = $db->query('SELECT * FROM berita');
            $results = $query->getResult();
            echo "Koneksi database BERHASIL!<br>";
            echo "Jumlah data di tabel berita: " . count($results);
        } catch (\Exception $e) {
            echo "Koneksi database GAGAL!<br>";
            echo $e->getMessage();
        }
    }
} 