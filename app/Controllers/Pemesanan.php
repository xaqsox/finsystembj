<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use App\Models\PelangganModel;
use App\Models\DetailPemesananModel;
use App\Models\AirMinumModel;
use CodeIgniter\Controller;

class Pemesanan extends Controller
{
    protected $pemesananModel;
    protected $detailModel;
    protected $airMinumModel;
    protected $pelangganModel;

    public function __construct()
    {
        $this->pemesananModel  = new PemesananModel();
        $this->detailModel     = new DetailPemesananModel();
        $this->airMinumModel   = new AirMinumModel();
        $this->pelangganModel  = new PelangganModel();
        helper(['form', 'url']);
    }

    public function create()
    {
        $id_pelanggan = session('id_pelanggan');

        $data = [
            'pelanggan'  => $this->pelangganModel->where('id_pelanggan', $id_pelanggan)->first(),
            'air_minum'  => $this->airMinumModel->findAll(),
        ];

        return view('pemesanan/create', $data);
    }

    public function store()
    {
        $id_pelanggan = session('id_pelanggan');
        $tanggal      = date('Y-m-d H:i:s');
        $produk       = $this->request->getPost('produk');
        $jumlah       = $this->request->getPost('jumlah');

        $total  = 0;
        $detail = [];

    // Validasi stok & hitung total
        foreach ($produk as $i => $id_air) {
            $air = $this->airMinumModel->find($id_air);

            if (!$air) {
                return redirect()->back()->with('error', 'Produk tidak ditemukan.');
            }

            if ($air['stok'] < $jumlah[$i]) {
                return redirect()->back()->with('error', 'Stok ' . $air['nama_air_minum'] . ' tidak mencukupi.');
            }

            $subtotal = $air['harga'] * $jumlah[$i];
            $total   += $subtotal;

            $detail[] = [
                'id_air_minum' => $id_air,
                'jumlah'       => $jumlah[$i],
                'subtotal'     => $subtotal
            ];
        }

    // Simpan pesanan
        $this->pemesananModel->insert([
            'tanggal_pesan'     => $tanggal,
            'total'             => $total,
            'id_pelanggan'      => $id_pelanggan,
            'status_pemesanan'  => 'pending'
        ]);

        $id_pemesanan = $this->pemesananModel->insertID();

    // Simpan detail & kurangi stok
        foreach ($detail as $d) {
            $d['id_pemesanan'] = $id_pemesanan;
            $this->detailModel->insert($d);

        // Kurangi stok lewat model
            $this->airMinumModel->kurangiStok($d['id_air_minum'], $d['jumlah']);
        }

        return redirect()->to('/pemesanan')->with('success', 'Pesanan berhasil ditambahkan.');
    }


    public function riwayat()
    {
        $id_pelanggan = session('id_pelanggan');

        $data['pemesanan'] = $this->pemesananModel
        ->where('id_pelanggan', $id_pelanggan)
        ->orderBy('tanggal_pesan', 'DESC')
        ->findAll();

        $data['detail'] = [];

        foreach ($data['pemesanan'] as $pesanan) {
            $detail = $this->detailModel
            ->where('id_pemesanan', $pesanan['id_pemesanan'])
            ->join('air_minum', 'air_minum.id_air_minum = detail_pesanan.id_air_minum')
            ->findAll();

            $data['detail'][$pesanan['id_pemesanan']] = $detail;
        }

        return view('pemesanan/riwayat', $data);
    }

    public function index()
    {
        $data['title'] = 'Riwayat Pemesanan';
        $data['pemesanan'] = $this->pemesananModel
        ->where('id_pelanggan', session('id_pelanggan'))
        ->findAll();

        return view('pemesanan/index', $data);
    }
}
