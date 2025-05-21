<?php

namespace App\Controllers;

use App\Models\ProgramKerjaModel;
use App\Models\StrukturOrganisasiModel;
use App\Models\BeritaModel;
use App\Models\GaleriModel;  // Perbaikan namespace import

class Home extends BaseController
{
    protected $galeriModel;

    public function __construct()
    {
        $this->galeriModel = new GaleriModel();
    }

    // program kerja
    public function index()
    {
        $programKerjaModel = new ProgramKerjaModel();
        $program_kerja = $programKerjaModel->findAll();

        return view('home/index', [
            'program_kerja' => $program_kerja
        ]);
    }
    public function programKerja()
    {
        $programKerjaModel = new \App\Models\ProgramKerjaModel();
        $data = [
            'title' => 'Program Kerja BEM FST',
            'program_kerja' => $programKerjaModel->findAll()
        ];
        return view('home/page_program_kerja', $data);
    }

    public function pageProgramKerja()
    {
        $programKerjaModel = new \App\Models\ProgramKerjaModel();
        $data = [
            'title' => 'Program Kerja BEM FST',
            'program_kerja' => $programKerjaModel->findAll()
        ];
        return view('home/page_program_kerja', $data);
    }
    // end program kerja

    // Struktur Organisasi
    public function strukturOrganisasi()
    {
        $strukturOrganisasiModel = new StrukturOrganisasiModel();
        $data = [
            'title' => 'Struktur Organisasi BEM FST',
            'struktur_organisasi' => $strukturOrganisasiModel->findAll()
        ];
        return view('home/page_struktur_organisasi', $data);
    }
    public function pageStrukturOrganisasi()
    {
        $strukturOrganisasiModel = new StrukturOrganisasiModel();
        $data = [
            'title' => 'Struktur Organisasi BEM FST',
            'struktur_organisasi' => $strukturOrganisasiModel->findAll()
        ];
        return view('home/page_struktur_organisasi', $data);
    }
    // end Struktur Organisasi

    // Berita
    public function berita()
    {
        $beritaModel = new BeritaModel();
        $data = [
            'title' => 'Berita BEM FST',
            'berita' => $beritaModel->findAll()
        ];
        return view('home/page_berita', $data);
    }
    public function pageBerita()
    {
        $beritaModel = new BeritaModel();
        $data = [
            'title' => 'Berita BEM FST',
            'berita' => $beritaModel->findAll()
        ];
        return view('home/page_berita', $data);
    }
    public function detailBerita($id)
    {
        $beritaModel = new BeritaModel();
        $data = [
            'title' => 'Detail Berita',
            'berita' => $beritaModel->find($id)
        ];
        return view('home/detail_berita', $data);
    }
    public function pageDetailBerita($id)
    {
        $beritaModel = new BeritaModel();
        $data = [
            'title' => 'Detail Berita',
            'berita' => $beritaModel->find($id)
        ];
        return view('home/detail_berita', $data);
    }
    // end Berita

    // Galeri
    public function galeri()
    {
        $data = [
            'title' => 'Galeri BEM FST',
            'galeri' => $this->galeriModel->orderBy('id', 'DESC')->findAll()
        ];
        return view('home/page_galeri', $data);
    }

    public function detailGaleri($id)
    {
        $galeri = $this->galeriModel->find($id);

        if (!$galeri) {
            return redirect()->to('/galeri')->with('error', 'Galeri tidak ditemukan');
        }

        $data = [
            'title' => $galeri['judul'] ?? 'Detail Galeri',
            'galeri' => $galeri
        ];
        return view('home/detail_galeri', $data);
    }
    // end Galeri
}
