<?php

namespace App\Controllers;

use App\Models\TrackingPesananModel;
use App\Models\PengirimanModel;
use App\Models\PemesananModel;

class TrackingPesanan extends BaseController
{
    protected $trackingModel;
    protected $pengirimanModel;
    protected $pemesananModel;

    public function __construct()
    {
        $this->trackingModel   = new TrackingPesananModel();
        $this->pengirimanModel = new PengirimanModel();
        $this->pemesananModel  = new PemesananModel();
    }

    /*  <<Halaman daftar pesanan pelanggan>> */
    public function index()
    {
        $id_pelanggan = session('id_pelanggan');

        $data['pesanan'] = $this->pemesananModel
        ->select('id_pemesanan, tanggal_pesan, status_pemesanan, total')
        ->where('id_pelanggan', $id_pelanggan)
        ->orderBy('tanggal_pesan', 'DESC')
        ->findAll();

        return view('trackorder/index', $data);
    }

   
    public function detail($id_pemesanan)
    {
        $pesananModel = new \App\Models\PemesananModel();
        $trackingModel = new \App\Models\TrackingPesananModel();

        $pesanan = $pesananModel->find($id_pemesanan);
        $tracking = $trackingModel->getByPemesanan($id_pemesanan);

        return view('trackorder/detail', [
            'pesanan' => $pesanan,
            'tracking' => $tracking
        ]);
    }

    /* <<Kurir update status pengiriman>> */
    public function updateStatus($id_pengiriman)
    {
        $status = $this->request->getPost('status_kirim');

        /* <<update status pengiriman>> */
        $this->pengirimanModel->update($id_pengiriman, [
            'status_kirim' => $status
        ]);

        /* <<GET data pengiriman?? */
        $pengiriman = $this->pengirimanModel->find($id_pengiriman);

        /* <SAVE log tracking>> */
        $this->trackingModel->insert([
            'id_pemesanan'  => $pengiriman['id_pemesanan'],
            'id_pengiriman' => $id_pengiriman,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Status diubah menjadi "' . $status . '" oleh kurir'
        ]);

        /* <<Diterima = SELESAI>>*/
        if ($status === 'diterima') {
            $this->pemesananModel->update($pengiriman['id_pemesanan'], [
                'status_pemesanan' => 'selesai'
            ]);
        }

        return redirect()->back()->with('success', 'Status pengiriman berhasil diperbarui');
    }
}
