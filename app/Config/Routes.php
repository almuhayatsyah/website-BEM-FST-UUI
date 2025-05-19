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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
* --------------------------------------------------------------------
* Route Definitions
* --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

// Protected Routes
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/dashboard', 'Dashboard::index');

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

    // Program Kerja Routes
    $routes->get('program-kerja', 'ProgramKerja::index');
    $routes->get('program-kerja/create', 'ProgramKerja::create');
    $routes->post('program-kerja/store', 'ProgramKerja::store');
    $routes->get('program-kerja/edit/(:num)', 'ProgramKerja::edit/$1');
    $routes->post('program-kerja/update/(:num)', 'ProgramKerja::update/$1');
    $routes->post('program-kerja/delete/(:num)', 'ProgramKerja::delete/$1');


    // berita routes
    $routes->get('berita', 'BeritaController::index');
    $routes->get('berita/create', 'BeritaController::create');
    $routes->post('berita/store', 'BeritaController::store');
    $routes->get('berita/edit/(:num)', 'BeritaController::edit/$1');
    $routes->post('berita/update/(:num)', 'BeritaController::update/$1');
    $routes->post('berita/delete/(:num)', 'BeritaController::delete/$1');

    // galeri routes
    $routes->get('galeri', 'GaleriController::index');
    $routes->get('galeri/create', 'GaleriController::create');
    $routes->post('galeri/store', 'GaleriController::store');
    $routes->get('galeri/edit/(:num)', 'GaleriController::edit/$1');
    $routes->post('galeri/update/(:num)', 'GaleriController::update/$1');
    $routes->post('galeri/delete/(:num)', 'GaleriController::delete/$1');

    // Hubungi Kami routes
    $routes->group('hubungi-kami', function ($routes) {
        $routes->get('/', 'HubungiKamiController::index');
        $routes->get('create', 'HubungiKamiController::create');
        $routes->post('store', 'HubungiKamiController::store');
        $routes->get('edit/(:num)', 'HubungiKamiController::edit/$1');
        $routes->post('update/(:num)', 'HubungiKamiController::update/$1');
        $routes->post('delete/(:num)', 'HubungiKamiController::delete/$1');
    });

    // sejarah routes
    $routes->get('sejarah', 'SejarahController::index');
    $routes->post('sejarah/update', 'SejarahController::update');
    $routes->get('sejarah/create', 'SejarahController::create');
    $routes->post('sejarah/store', 'SejarahController::store');
    $routes->get('sejarah/edit/(:num)', 'SejarahController::edit/$1');
    $routes->post('sejarah/delete/(:num)', 'SejarahController::delete/$1');


    // visi-misi routes
    $routes->get('visi-misi', 'VisiMisi::index');
    $routes->get('visi-misi/create', 'VisiMisi::create');
    $routes->post('visi-misi/store', 'VisiMisi::store');
    $routes->get('visi-misi/edit/(:num)', 'VisiMisi::edit/$1');
    $routes->post('visi-misi/update/(:num)', 'VisiMisi::update/$1');
    $routes->post('visi-misi/delete/(:num)', 'VisiMisi::delete/$1');

    // peraturan routes

    // Pengaturan routes
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
