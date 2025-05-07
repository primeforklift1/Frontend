<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// default routes
$routes->get('/', 'Home::index');
$routes->get('/tentang-kami', 'Home::tentangKami');
$routes->get('/produk', 'Home::produk');
$routes->get('/forklift', 'Home::forklift');
$routes->get('/sparepart', 'Home::sparepart');
$routes->get('/ban', 'Home::ban');
$routes->get('/battery', 'Home::battery');
$routes->get('/attachment', 'Home::attachment');
$routes->get('/layanan', 'Home::layanan');
$routes->get('/rental', 'Home::rental');
$routes->get('/service', 'Home::service');
$routes->get('/blog', 'Home::blog');
// id routes
$routes->get('/id', 'Home::index');
$routes->get('/id/tentang-kami', 'Home::tentangKami');
$routes->get('/id/produk', 'Home::produk');
$routes->get('/id/forklift', 'Home::forklift');
$routes->get('/id/sparepart', 'Home::sparepart');
$routes->get('/id/ban', 'Home::ban');
$routes->get('/id/battery', 'Home::battery');
$routes->get('/id/attachment', 'Home::attachment');
$routes->get('/id/layanan', 'Home::layanan');
$routes->get('/id/rental', 'Home::rental');
$routes->get('/id/service', 'Home::service');
$routes->get('/id/blog', 'Home::blog');
// cn routes
$routes->get('/cn', 'Home::index');
$routes->get('/cn/关于我们', 'Home::tentangKami');
$routes->get('/cn/产品', 'Home::produk');
$routes->get('/cn/叉车', 'Home::forklift');
$routes->get('/cn/备件', 'Home::sparepart');
$routes->get('/cn/胎', 'Home::ban');
$routes->get('/cn/电池', 'Home::battery');
$routes->get('/cn/依恋', 'Home::attachment');
$routes->get('/cn/服务', 'Home::layanan');
$routes->get('/cn/出租', 'Home::rental');
$routes->get('/cn/服务', 'Home::service');
$routes->get('/cn/博客', 'Home::blog');
// jp routes
$routes->get('/jp', 'Home::index');
$routes->get('/jp/私たちについて', 'Home::tentangKami');
$routes->get('/jp/製品', 'Home::produk');
$routes->get('/jp/フォークリフト', 'Home::forklift');
$routes->get('/jp/スペアパーツ', 'Home::sparepart');
$routes->get('/jp/禁止', 'Home::ban');
$routes->get('/jp/バッテリー', 'Home::battery');
$routes->get('/jp/アタッチメント', 'Home::attachment');
$routes->get('/jp/サービス', 'Home::layanan');
$routes->get('/jp/レンタル', 'Home::rental');
$routes->get('/jp/サービス', 'Home::service');
$routes->get('/jp/ブログ', 'Home::blog');
// gn routes
$routes->get('/gn', 'Home::index');
$routes->get('/gn/über-uns', 'Home::tentangKami');
$routes->get('/gn/produkt', 'Home::produk');
$routes->get('/gn/gabelstapler', 'Home::forklift');
$routes->get('/gn/ersatzteile', 'Home::sparepart');
$routes->get('/gn/verbot', 'Home::ban');
$routes->get('/gn/batterie', 'Home::battery');
$routes->get('/gn/Anhang', 'Home::attachment');
$routes->get('/gn/service', 'Home::layanan');
$routes->get('/gn/vermietung', 'Home::rental');
$routes->get('/gn/service', 'Home::service');
$routes->get('/gn/blog', 'Home::blog');
// $routes->get('/(:any)', 'Home::setLanguage/$1');
// $routes->get('/(:any)', 'Home::setLanguage/$1');
// $routes->get('/(:any)', 'Home::setLanguage/$1');
// $routes->get('/(:any)', 'Home::setLanguage/$1');
