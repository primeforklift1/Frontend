<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        return view('pages-admin/dashboard');
    }
    public function login(): string
    {
        return view('pages-admin/login');
    }
    public function logout(): string
    {
        echo '<script>localStorage.removeItem("authToken");</script>';
        return view('pages-admin/login');
    }
    public function dashboard(): string
    {
        return view('pages-admin/dashboard');
    }
    public function bahasa(): string
    {
        return view('pages-admin/bahasa');
    }
    public function kategori(): string
    {
        return view('pages-admin/kategori');
    }
    public function merek(): string
    {
        return view('pages-admin/merek');
    }
    public function client(): string
    {
        return view('pages-admin/client');
    }
    public function menu(): string
    {
        return view('pages-admin/menu');
    }
    public function info(): string
    {
        return view('pages-admin/info');
    }
    public function slider(): string
    {
        return view('pages-admin/slider');
    }
    public function produk(): string
    {
        return view('pages-admin/produk');
    }
    public function layanan(): string
    {
        return view('pages-admin/layanan');
    }
    public function blog(): string
    {
        return view('pages-admin/blog');
    }
    public function pesan(): string
    {
        return view('pages-admin/pesan');
    }
    public function copyFromNode()
    {
        $request = service('request');

        // Ambil path dan nama file dari request
        $sourcePath = $request->getPost('sourcePath'); // contoh: /var/www/nodejs/uploads/file.png
        $sourceDir = $request->getPost('sourceDir'); // contoh: /var/www/nodejs/uploads/file.png
        $filename = basename($sourcePath); // ambil nama file saja
        $targetDir = FCPATH . $sourceDir; // public/
        $targetPath = $targetDir . $filename;

        // Cek dan buat folder jika belum ada
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // Salin file
        if (file_exists($sourcePath)) {
            if (copy($sourcePath, $targetPath)) {
                return $this->response->setJSON([
                    'status' => true,
                    'message' => 'File berhasil disalin',
                    'url' => base_url($sourceDir . $filename),
                    'path' => $targetPath
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Gagal menyalin file'
                ]);
            }
        }

        return $this->response->setJSON([
            'status' => false,
            'message' => 'Source file tidak ditemukan'
        ]);
    }
}
