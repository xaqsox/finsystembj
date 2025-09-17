<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use CodeIgniter\Controller;

class PemesananAdmin extends Controller
{
    protected $pemesananModel;

    public function __construct()
    {
        $this->pemesananModel = new PemesananModel();
    }

    public function index()
    {
        $data = [
            'title'      => 'Kelola Pemesanan',
            'pemesanan'  => $this->pemesananModel->getWithPelanggan(),
        ];

        return view('adminorder/index', $data);
    }

    public function ubahStatus($id)
    {
        $this->pemesananModel->update($id, ['status_pemesanan' => 'diproses']);
        return redirect()->to('/adminorder')->with('success', 'Status diubah menjadi diproses.');
    }
}
