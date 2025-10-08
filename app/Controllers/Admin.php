<?php

namespace App\Controllers;

use CodeIgniter\Log\Logger;

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

        // Logger('testing');
        $sourceUrl = $request->getPost('sourceUrl');
        $targetDir = FCPATH . $request->getPost('targetDir');
        $filename = basename($sourceUrl);
        $targetPath = $targetDir . $filename;

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // Download file
        $fileContent = @file_get_contents($sourceUrl);
        if ($fileContent !== false) {
            file_put_contents($targetPath, $fileContent);
            return $this->response->setJSON([
                'status' => true,
                'message' => 'File berhasil didownload dan disimpan',
                'url' => base_url($request->getPost('targetDir') . $filename),
                'path' => $targetPath
            ]);
        }

        return $this->response->setJSON([
                'status' => false,
                'message' => 'Gagal mengunduh file dari ' . $sourceUrl
            ]);
    }

    public function promosi(): string
    {
        return view('pages-admin/promosi');
    }
}
