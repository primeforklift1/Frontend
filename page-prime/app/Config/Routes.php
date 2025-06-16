<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// admin
$routes->get('/login', 'Admin::login');
$routes->get('/logout', 'Admin::logout');

$routes->get('/admin', 'Admin::dashboard');
$routes->get('/admin/bahasa', 'Admin::bahasa');
$routes->get('/admin/kategori', 'Admin::kategori');
$routes->get('/admin/merek', 'Admin::merek');
$routes->get('/admin/client', 'Admin::client');

$routes->get('/admin/menu', 'Admin::menu');
$routes->get('/admin/info', 'Admin::info');
$routes->get('/admin/slider', 'Admin::slider');
$routes->get('/admin/produk', 'Admin::produk');
$routes->get('/admin/layanan', 'Admin::layanan');
$routes->get('/admin/blog', 'Admin::blog');
$routes->get('/admin/pesan', 'Admin::pesan');


$routes->post('copy-node-file', 'Admin::copyFromNode');

// default routes
$routes->get('/', 'Home::index');
$routes->get('/tentang-kami', 'Home::tentangKami');
$routes->get('/produk', 'Home::produk');
$routes->get('/produk/(:any)', 'Home::produkView/$1');
$routes->get('/forklift', 'Home::forklift');
$routes->get('/sparepart', 'Home::sparepart');
$routes->get('/ban', 'Home::ban');
$routes->get('/battery', 'Home::battery');
$routes->get('/attachment', 'Home::attachment');
$routes->get('/layanan', 'Home::layanan');
$routes->get('/rental', 'Home::rental');
$routes->get('/service', 'Home::service');
$routes->get('/blog', 'Home::blog');
$routes->get('/blog/(:any)', 'Home::blogView/$1');
// id routes
$routes->get('/id', 'Home::index');
$routes->get('/id/tentang-kami', 'Home::tentangKami');
$routes->get('/id/produk', 'Home::produk');
$routes->get('/id/produk/(:any)', 'Home::produkView/$1');
$routes->get('/id/forklift', 'Home::forklift');
$routes->get('/id/sparepart', 'Home::sparepart');
$routes->get('/id/ban', 'Home::ban');
$routes->get('/id/battery', 'Home::battery');
$routes->get('/id/attachment', 'Home::attachment');
$routes->get('/id/layanan', 'Home::layanan');
$routes->get('/id/rental', 'Home::rental');
$routes->get('/id/service', 'Home::service');
$routes->get('/id/blog', 'Home::blog');
$routes->get('/id/blog/(:any)', 'Home::blogView/$1');
// cn routes
$routes->get('/cn', 'Home::index');
$routes->get('/cn/关于我们', 'Home::tentangKami');
$routes->get('/cn/产品', 'Home::produk');
$routes->get('/cn/产品/(:any)', 'Home::produkView/$1');
$routes->get('/cn/叉车', 'Home::forklift');
$routes->get('/cn/备件', 'Home::sparepart');
$routes->get('/cn/胎', 'Home::ban');
$routes->get('/cn/电池', 'Home::battery');
$routes->get('/cn/依恋', 'Home::attachment');
$routes->get('/cn/所有服务', 'Home::layanan');
$routes->get('/cn/出租', 'Home::rental');
$routes->get('/cn/服务', 'Home::service');
$routes->get('/cn/博客', 'Home::blog');
$routes->get('/cn/博客/(:any)', 'Home::blogView/$1');
// jp routes
$routes->get('/jp', 'Home::index');
$routes->get('/jp/私たちについて', 'Home::tentangKami');
$routes->get('/jp/製品', 'Home::produk');
$routes->get('/jp/製品/(:any)', 'Home::produkView/$1');
$routes->get('/jp/フォークリフト', 'Home::forklift');
$routes->get('/jp/スペアパーツ', 'Home::sparepart');
$routes->get('/jp/禁止', 'Home::ban');
$routes->get('/jp/バッテリー', 'Home::battery');
$routes->get('/jp/アタッチメント', 'Home::attachment');
$routes->get('/jp/すべてのサービス', 'Home::layanan');
$routes->get('/jp/レンタル', 'Home::rental');
$routes->get('/jp/サービス', 'Home::service');
$routes->get('/jp/ブログ', 'Home::blog');
$routes->get('/jp/ブログ/(:any)', 'Home::blogView/$1');
// gn routes
$routes->get('/gn', 'Home::index');
$routes->get('/gn/über-uns', 'Home::tentangKami');
$routes->get('/gn/produkt', 'Home::produk');
$routes->get('/gn/produkt/(:any)', 'Home::produkView/$1');
$routes->get('/gn/gabelstapler', 'Home::forklift');
$routes->get('/gn/ersatzteile', 'Home::sparepart');
$routes->get('/gn/verbot', 'Home::ban');
$routes->get('/gn/batterie', 'Home::battery');
$routes->get('/gn/Anhang', 'Home::attachment');
$routes->get('/gn/alle-ienstleistungen', 'Home::layanan');
$routes->get('/gn/vermietung', 'Home::rental');
$routes->get('/gn/service', 'Home::service');
$routes->get('/gn/blog', 'Home::blog');
$routes->get('/gn/blog/(:any)', 'Home::blogView/$1');



// $routes->get('/(:any)', 'Home::setLanguage/$1');
// $routes->get('/(:any)', 'Home::setLanguage/$1');
// $routes->get('/(:any)', 'Home::setLanguage/$1');
// $routes->get('/(:any)', 'Home::setLanguage/$1');
