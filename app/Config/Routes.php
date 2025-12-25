<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 *
 */
$routes->get('/', 'Home::index');

$routes->setAutoRoute(true);

$routes->get('/admin', 'Admin::index');

// Proxy endpoints to the Python chatbot so frontend can use same domain
$routes->post('/chatproxy/status', 'ChatProxy::status');

$routes->post('/chatproxy/chat', 'ChatProxy::chat');

$routes->get('home/psikolog', 'Home::psikolog');  // Untuk Psikolog

$routes->get('home/about', 'Home::about');    // Untuk Tentang Kami (menggunakan method about)

$routes->get('home/consult', 'Home::consult');  // BARU: Untuk Konsultasi Sekarang

// --- TAMBAHAN ROUTE UNTUK HALAMAN PENJADWALAN ---
// Route ini akan mengarahkan request "/home/schedule" ke Controller "Home" dan Method "schedule"
$routes->get('home/schedule', 'Home::schedule');

// Anda mungkin juga ingin menambahkan parameter {id} jika Anda menggunakan segmen URL yang bersih
$routes->get('home/schedule/(:num)', 'Home::schedule/$1');


// Function buat manggil pages dari folder profilPsikologPages 
$routes->get('profil-psikolog/(:num)', 'Home::profilPsikolog/$1');

// Function buat manggil pages dari folder profilPsikologPagesLoggedin
$routes->get('profil-psikolog-login/(:num)', 'Index3::profilPsikolog/$1');

// Function buat manggil pages dari folder paketPages
$routes->get('paket/(:any)', 'Index3::paket/$1');

// Routes untuk PsikologController 
$routes->get('/coupleCurhat', 'PsikologController::coupleCurhat');
$routes->get('/kuyCurhat', 'PsikologController::kuyCurhat');
$routes->get('/paketCurhat', 'PsikologController::paketCurhat');




