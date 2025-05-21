<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
* --------------------------------------------------------------------
* Route Definitions
* --------------------------------------------------------------------
*/

// Public routes
$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');


// ||| Public routes|||
// Public Program Kerja route - pastikan ini di luar group admin
$routes->get('program-kerja/public', 'Home::programKerja');
// Public Struktur Organisasi route - pastikan ini di luar group admin
$routes->get('struktur-organisasi/public', 'Home::strukturOrganisasi');
// public berita route
$routes->get('berita', 'Home::berita');
// public galeri route
$routes->get('galeri', 'Home::galeri');


// Frontend routes
$routes->get('galeri', 'GaleriController::show_galeri');
$routes->get('galeri/detail/(:num)', 'GaleriController::detail/$1');


// Admin routes
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');

    // Program Kerja Routes untuk Admin Panel
    $routes->get('program-kerja', 'ProgramKerja::index');
    $routes->get('program-kerja/create', 'ProgramKerja::create');
    $routes->post('program-kerja/store', 'ProgramKerja::store');
    $routes->get('program-kerja/edit/(:num)', 'ProgramKerja::edit/$1');
    $routes->post('program-kerja/update/(:num)', 'ProgramKerja::update/$1');
    $routes->post('program-kerja/delete/(:num)', 'ProgramKerja::delete/$1');

    // Berita Routes
    $routes->get('berita/detail/(:num)', 'BeritaController::detail/$1');
    $routes->get('berita/create', 'BeritaController::create');
    $routes->post('berita/store', 'BeritaController::store');
    $routes->get('berita/edit/(:num)', 'BeritaController::edit/$1');
    $routes->post('berita/update/(:num)', 'BeritaController::update/$1');
    $routes->post('berita/delete/(:num)', 'BeritaController::delete/$1');

    // Galeri Routes
    $routes->get('galeri', 'GaleriController::index');
    $routes->get('galeri/create', 'GaleriController::create');
    $routes->post('galeri/store', 'GaleriController::store');
    $routes->get('galeri/edit/(:num)', 'GaleriController::edit/$1');
    $routes->post('galeri/update/(:num)', 'GaleriController::update/$1');
    $routes->post('galeri/delete/(:num)', 'GaleriController::delete/$1');

    // Sejarah Routes
    $routes->get('sejarah', 'SejarahController::index');
    $routes->post('sejarah/update', 'SejarahController::update');
    $routes->get('sejarah/create', 'SejarahController::create');
    $routes->post('sejarah/store', 'SejarahController::store');
    $routes->get('sejarah/edit/(:num)', 'SejarahController::edit/$1');
    $routes->post('sejarah/delete/(:num)', 'SejarahController::delete/$1');

    // Visi Misi Routes
    $routes->get('visimisi', 'VisiMisiController::index');
    $routes->get('visimisi/create', 'VisiMisiController::update');
    $routes->get('visimisi/create', 'VisiMisiController::create');
    $routes->post('visimisi/store', 'VisiMisiController::store');
    $routes->get('visimisi/edit/(:num)', 'VisiMisiController::edit/$1');
    $routes->post('visimisi/delete/(:num)', 'VisiMisiController::delete/$1');


    // User Management Routes (Super Admin Only)
    $routes->group('', ['filter' => 'auth:super_admin'], function ($routes) {
        $routes->get('/user', 'User::index');
        $routes->get('/user/create', 'User::create');
        $routes->post('/user/store', 'User::store');
        $routes->get('/user/edit/(:num)', 'User::edit/$1');
        $routes->post('/user/update/(:num)', 'User::update/$1');
        $routes->delete('/user/delete/(:num)', 'User::delete/$1');
        $routes->get('/user/create-super-admin', 'User::createSuperAdmin');
    });

    // Struktur Organisasi Routes
    $routes->get('struktur-organisasi', 'StrukturOrganisasiController::index');
    $routes->get('struktur-organisasi/create', 'StrukturOrganisasiController::create');
    $routes->post('struktur-organisasi/store', 'StrukturOrganisasiController::store');
    $routes->get('struktur-organisasi/edit/(:num)', 'StrukturOrganisasiController::edit/$1');
    $routes->post('struktur-organisasi/update/(:num)', 'StrukturOrganisasiController::update/$1');
    $routes->post('struktur-organisasi/delete/(:num)', 'StrukturOrganisasiController::delete/$1');


    // Hubungi Kami Routes
    $routes->group('hubungi-kami', function ($routes) {
        $routes->get('/', 'HubungiKamiController::index');
        $routes->get('create', 'HubungiKamiController::create');
        $routes->post('store', 'HubungiKamiController::store');
        $routes->get('edit/(:num)', 'HubungiKamiController::edit/$1');
        $routes->post('update/(:num)', 'HubungiKamiController::update/$1');
        $routes->post('delete/(:num)', 'HubungiKamiController::delete/$1');
    });

    // pengaturan routes
    $routes->group('pengaturan', function ($routes) {
        $routes->get('/', 'PengaturanController::index');
        $routes->post('update-profile', 'PengaturanController::updateProfile');
        $routes->post('update-website', 'PengaturanController::updateWebsite');
    });
}); // Tutup group auth

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
