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
    public function blog(): string
    {
        return view('pages/tentang-kami');
    }
    public function setLanguage($id): string
    {
        return view('pages/landing');
    }
}
