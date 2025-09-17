<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\KurirModel;
use App\Models\PemesananModel;
use App\Models\PengirimanModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $role = session()->get('role_inti');
        if (!$role) return redirect()->to('/auth');

        $data = ['title' => 'Dashboard'];

        switch ($role) {
            case 'owner':
            case 'admin':
               /*  <<Hitung total data>> */
                $pelangganModel  = new PelangganModel();
                $kurirModel      = new KurirModel();
                $pemesananModel  = new PemesananModel();
                $pengirimanModel = new PengirimanModel();

                $data['totalPelanggan']  = $pelangganModel->countAllResults();
                $data['totalKurir']      = $kurirModel->countAllResults();
                $data['totalPesanan']    = $pemesananModel->countAllResults();
                $data['totalPengiriman'] = $pengirimanModel->countAllResults();

                return view('dashboard/admin', $data);

            case 'pelanggan':
                return $this->pelanggan();

            case 'kurir':
                return view('dashboard/kurir', $data);

            default:
                return redirect()->to('/auth')->with('error', 'Role tidak dikenali');
        }
    }

    public function pelanggan()
    { 
        $idPelanggan = session()->get('id_pelanggan'); 

        $pemesananModel = new PemesananModel();
        $history = $pemesananModel
            ->where('id_pelanggan', $idPelanggan)
            ->orderBy('tanggal_pesan', 'DESC')
            ->limit(5)
            ->findAll();

        return view('dashboard/pelanggan', [
            'history' => $history
        ]);
    }
}
