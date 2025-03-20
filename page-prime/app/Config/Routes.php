<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/tentang-kami', 'Home::tentangKami');
$routes->get('/produk', 'Home::produk');
$routes->get('/sparepart', 'Home::sparepart');
$routes->get('/forklift', 'Home::forklift');
$routes->get('/ban', 'Home::ban');
$routes->get('/battery', 'Home::battery');
$routes->get('/attachment', 'Home::attachment');
$routes->get('/rental', 'Home::rental');
$routes->get('/service', 'Home::service');
$routes->get('/blog', 'Home::blog');
$routes->get('/(:any)', 'Home::setLanguage/$1');
$routes->get('/(:any)', 'Home::setLanguage/$1');
$routes->get('/(:any)', 'Home::setLanguage/$1');
$routes->get('/(:any)', 'Home::setLanguage/$1');
