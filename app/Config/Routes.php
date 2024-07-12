<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dosen', 'Dosen::list');
$routes->get('/dosen/tambah', 'Dosen::tambah');
$routes->post('/dosen/simpan', 'Dosen::simpan');
$routes->get('/dosen/edit/(:num)', 'Dosen::edit/$1');
$routes->post('/dosen/edit/(:num)', 'Dosen::update/$1');
$routes->get('/dosen/hapus/(:num)', 'Dosen::hapus/$1');
$routes->get('/dosen/hadir/(:num)', 'Dosen::hadir/$1');
$routes->get('/dosen/tidak/(:num)', 'Dosen::tidak/$1');