<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('pages/landing');
    }
    public function tentangKami(): string
    {
        return view('pages/tentang-kami');
    }
    public function produk(): string
    {
        return view('pages/produk');
    }
    public function sparepart(): string
    {
        return view('pages/tentang-kami');
    }
    public function forklift(): string
    {
        return view('pages/tentang-kami');
    }
    public function ban(): string
    {
        return view('pages/tentang-kami');
    }
    public function battery(): string
    {
        return view('pages/tentang-kami');
    }
    public function attachment(): string
    {
        return view('pages/tentang-kami');
    }
    public function layanan(): string
    {
        return view('pages/layanan');
    }
    public function rental(): string
    {
        return view('pages/rental');
    }
    public function service(): string
    {
        return view('pages/service');
    }
    public function blog(): string
    {
        return view('pages/blog');
    }
    public function setLanguage($id): string
    {
        return view('pages/landing');
    }
}
