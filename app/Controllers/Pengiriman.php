<?php

namespace App\Controllers;

use App\Models\PengirimanModel;
use App\Models\PemesananModel;
use App\Models\KurirModel;
use CodeIgniter\Controller;

class Pengiriman extends Controller
{
    protected $pengirimanModel;
    protected $pemesananModel;
    protected $kurirModel;

    public function __construct()
    {
        $this->pengirimanModel = new PengirimanModel();
        $this->pemesananModel  = new PemesananModel();
        $this->kurirModel      = new KurirModel();
        helper(['form', 'url']);
    }

   
    public function index()
    {
        /* <<mengambil semua pengiriman yang ada>> */
        $data['pengiriman'] = $this->pengirimanModel
        ->select('pengiriman.*, pemesanan.tanggal_pesan, pemesanan.total, pelanggan.nama_pelanggan, kurir.nama_kurir')
        ->join('pemesanan', 'pemesanan.id_pemesanan = pengiriman.id_pemesanan')
        ->join('pelanggan', 'pelanggan.id_pelanggan = pemesanan.id_pelanggan')
        ->join('kurir', 'kurir.id_kurir = pengiriman.id_kurir')
        ->orderBy('pengiriman.tanggal_kirim', 'DESC')
        ->findAll();

        /* <<Ambil pesanan yang belum ada di tabel pengiriman (status_pemesanan = 'diproses')>> */
        $data['belum_dikirim'] = $this->pemesananModel
        ->select('pemesanan.*, pelanggan.nama_pelanggan')
        ->join('pelanggan', 'pelanggan.id_pelanggan = pemesanan.id_pelanggan')
        ->where('pemesanan.status_pemesanan', 'diproses')
        ->where('pemesanan.id_pemesanan NOT IN (SELECT id_pemesanan FROM pengiriman)', null, false)
        ->findAll();

        $data['kurir'] = $this->kurirModel->findAll();

        return view('p3ngiriman/index', $data);
    }

    /*  <<Proses otomatis pengiriman (dengan aturan kendaraan)>> */
    public function prosesOtomatis($id_pemesanan)
    {
   
        $pemesanan = $this->pemesananModel
        ->select('pemesanan.*, pelanggan.id_jenis_pelanggan, jenis_pelanggan.nama_jenis')
        ->join('pelanggan', 'pelanggan.id_pelanggan = pemesanan.id_pelanggan')
        ->join('jenis_pelanggan', 'jenis_pelanggan.id_jenis_pelanggan = pelanggan.id_jenis_pelanggan')
        ->where('pemesanan.id_pemesanan', $id_pemesanan)
        ->first();

        if (!$pemesanan) {
            return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
        }

     /* <<Tentukan kriteria kendaraan>> */
        if ($pemesanan['nama_jenis'] === 'pabrik') {
            $whereKendaraan = "jenis_kendaraan.nama_jenis_kendaraan = 'mobil'";
        } else {
            $whereKendaraan = "jenis_kendaraan.nama_jenis_kendaraan != 'mobil'";
        }

     /* <<Cari kurir sesuai kriteria + pengiriman aktif paling sedikit>> */
        $kurir = $this->kurirModel
        ->select('kurir.*, COUNT(pengiriman.id_pengiriman) as total')
        ->join('jenis_kendaraan', 'jenis_kendaraan.id_jenis_kendaraan = kurir.id_kendaraan')
        ->join('pengiriman', 'pengiriman.id_kurir = kurir.id_kurir AND pengiriman.status_kirim != "diterima"', 'left')
        ->where($whereKendaraan)
        ->groupBy('kurir.id_kurir')
        ->orderBy('total', 'ASC')
        ->first();

        if (!$kurir) {
            return redirect()->back()->with('error', 'Tidak ada kurir yang sesuai kriteria tersedia.');
        }

          /* <<insert ke tabel pengiriman>> */
        $this->pengirimanModel->insert([
            'id_pemesanan'  => $id_pemesanan,
            'id_kurir'      => $kurir['id_kurir'],
            'tanggal_kirim' => date('Y-m-d H:i:s'),
            'status_kirim'  => 'diambil'
        ]);
          /* <<status pesan = dikirm>> */
        $this->pemesananModel->update($id_pemesanan, ['status_pemesanan' => 'dikirim']);

        return redirect()->to('/p3ngiriman')->with('success', 'Pesanan berhasil diproses dan ditugaskan ke kurir: ' . $kurir['nama_kurir']);
    }


    // Proses manual (admin pilih kurir)
    public function prosesManual()
    {
        $id_pemesanan = $this->request->getPost('id_pemesanan');
        $id_kurir     = $this->request->getPost('id_kurir');

        $this->pengirimanModel->insert([
            'id_pemesanan'  => $id_pemesanan,
            'id_kurir'      => $id_kurir,
            'tanggal_kirim' => date('Y-m-d H:i:s'),
            'status_kirim'  => 'diambil'
        ]);

        $this->pemesananModel->update($id_pemesanan, ['status_pemesanan' => 'dikirim']);

        return redirect()->to('/p3ngiriman')->with('success', 'Pesanan berhasil ditugaskan ke kurir.');
    }

    public function pelanggan()
    {
        $id_pelanggan = session('id_pelanggan');

        $data['title'] = 'Pengiriman Saya';
        $data['pengiriman'] = $this->pengirimanModel
        ->select('pengiriman.*, pemesanan.tanggal_pesan, kurir.nama_kurir')
        ->join('pemesanan', 'pemesanan.id_pemesanan = pengiriman.id_pemesanan')
        ->join('kurir', 'kurir.id_kurir = pengiriman.id_kurir')
        ->where('pemesanan.id_pelanggan', $id_pelanggan)
        ->orderBy('tanggal_kirim', 'DESC')
        ->findAll();

        return view('p3ngiriman/pelanggan', $data);
    }
}
