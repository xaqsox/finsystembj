<?php

namespace App\Controllers;

use App\Models\PengirimanModel;
use App\Models\TrackingPesananModel;
use App\Models\PemesananModel; // <- tambahkan ini
use CodeIgniter\Controller;

class PengirimanKurir extends Controller
{
    protected $pengirimanModel;
    protected $trackingModel;
    protected $pemesananModel; 

    public function __construct()
    {
        $this->pengirimanModel = new PengirimanModel();
        $this->trackingModel   = new TrackingPesananModel();
        $this->pemesananModel  = new PemesananModel(); 
        helper(['form', 'url']);
    }

    public function index()
    {
        $id_kurir = session('id_kurir');

        $data['title'] = 'Pengiriman Saya';
        $data['pengiriman'] = $this->pengirimanModel
            ->select('pengiriman.*, pemesanan.tanggal_pesan, pemesanan.total, pelanggan.nama_pelanggan')
            ->join('pemesanan', 'pemesanan.id_pemesanan = pengiriman.id_pemesanan')
            ->join('pelanggan', 'pelanggan.id_pelanggan = pemesanan.id_pelanggan')
            ->where('pengiriman.id_kurir', $id_kurir)
            ->orderBy('tanggal_kirim', 'DESC')
            ->findAll();

        return view('sendkurir/index', $data);
    }

    public function updateStatus($id_pengiriman)
    {
        $status_kirim = $this->request->getPost('status_kirim');

        /* <<Ambil data pengiriman untuk dapat id_pemesanan>> */
        $pengiriman = $this->pengirimanModel->find($id_pengiriman);
        if (!$pengiriman) {
            return redirect()->back()->with('error', 'Pengiriman tidak ditemukan.');
        }

        /* <<Update status di tabel pengiriman>> */
        $this->pengirimanModel->update($id_pengiriman, [
            'status_kirim' => $status_kirim
        ]);

        /* <<Add historis tracking otomatis>> */
        $this->trackingModel->insert([
            'id_pengiriman' => $pengiriman['id_pengiriman'],
            'keterangan'    => 'Status diubah menjadi "' . $status_kirim . '" oleh kurir',
            'waktu'         => date('Y-m-d H:i:s'),
        ]);

        /* <<Jika status kirim = diterima, update juga status pemesanan jadi selesai>> */
        if ($status_kirim === 'diterima') {
            $this->pemesananModel->update($pengiriman['id_pemesanan'], [
                'status_pemesanan' => 'selesai'
            ]);
        }

        return redirect()->to('/sendkurir')->with('success', 'Status pengiriman diperbarui.');
    }
}
