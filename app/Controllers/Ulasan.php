<?php

namespace App\Controllers;

use App\Models\UlasanModel;
use App\Models\PemesananModel;
use CodeIgniter\Controller;

class Ulasan extends Controller
{
    protected $ulasanModel;
    protected $pemesananModel;

    public function __construct()
    {
        $this->ulasanModel   = new UlasanModel();
        $this->pemesananModel = new PemesananModel();
    }

    /* <<Kumpulan ulasan yang ditambahkan (Interface Admin)>> */ 
    public function index()
    {
        $data['title'] = 'Manajemen Ulasan';
        $data['ulasan'] = $this->ulasanModel
            ->select('ulasan.*, pelanggan.nama_pelanggan, pemesanan.tanggal_pesan')
            ->join('pelanggan', 'pelanggan.id_pelanggan = ulasan.id_pelanggan')
            ->join('pemesanan', 'pemesanan.id_pemesanan = ulasan.id_pemesanan')
            ->orderBy('ulasan.created_at', 'DESC')
            ->findAll();

        return view('ulasan/admin/index', $data);
    }

    /* <<Form Ulasan Interface Pelangggan>> */
    public function pelanggan()
    {
        $id_pelanggan = session()->get('id_pelanggan');

        $data['title'] = 'Ulasan Saya';
        $data['pesanan'] = $this->pemesananModel
            ->select('pemesanan.*, ulasan.id_ulasan, ulasan.rating, ulasan.komentar')
            ->join('ulasan', 'ulasan.id_pemesanan = pemesanan.id_pemesanan AND ulasan.id_pelanggan = ' . $id_pelanggan, 'left')
            ->where('pemesanan.id_pelanggan', $id_pelanggan)
            ->where('pemesanan.status_pemesanan', 'selesai')
            ->orderBy('pemesanan.tanggal_pesan', 'DESC')
            ->findAll();

        return view('ulasan/pelanggan/index', $data);
    }

    /* <<Menyimpan Data Ulasan>> */
    public function store()
    {
        $this->ulasanModel->save([
            'id_pemesanan' => $this->request->getPost('id_pemesanan'),
            'id_pelanggan' => session()->get('id_pelanggan'),
            'rating'       => $this->request->getPost('rating'),
            'komentar'     => $this->request->getPost('komentar')
        ]);

        return redirect()->to('/ulasan/pelanggan')->with('success', 'Ulasan berhasil dikirim!');
    }
}
