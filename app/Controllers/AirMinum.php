<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AirMinumModel;
use App\Models\JenisAirMinumModel;

class AirMinum extends BaseController
{
    protected $airModel;
    protected $jenisModel;

    /*  Controller : AirMinum.php                                                
      |--------------------------------------------------------------------------|
      | Berfungsi Untuk mengatur antara view/model data airminum                 |
      |--------------------------------------------------------------------------|
     */ 

      public function __construct()
      {
        $this->airModel   = new AirMinumModel();
        $this->jenisModel = new JenisAirMinumModel();
        helper(['form', 'url']);
    }
      /*
       | ===============================================|
       | Deklarasi judul agar dapat ditampilkan di view |
       | ===============================================| 
      */                           
       public function index() 
       {
        $data = [
            'title'     => 'Data Air Minum',
            'airminum'  => $this->airModel->getWithJenis()
        ];

        return view('airminum/index', $data);
    }
      /* 
       | ==========================================|
       | Fungsi untuk menampilkan penambahan data  |
       | ==========================================| 
      */ 
       public function create() 
       {
        $data = [
            'title'      => 'Tambah Air Minum',
            'jenis_air'  => $this->jenisModel->findAll()
        ];

        return view('airminum/create', $data);
    }
      /*
       | ====================================================|
       | Fungsi untuk memproses/terima data kedalam database |
       | ====================================================| 
      */ 
       public function store()
       {
        $this->airModel->save([
            'nama_air_minum' => $this->request->getPost('nama_air_minum'),
            'harga'          => $this->request->getPost('harga'),
            'stok'           => $this->request->getPost('stok'),
            'id_jenis_air'   => $this->request->getPost('id_jenis_air'),
        ]);

        return redirect()->to('/airminum')->with('success', 'Data berhasil disimpan.');
    }
      /*
       | ====================================================|
       | Fungsi untuk menampilkan data edit kedalam database |
       | ====================================================| 
      */ 
       public function edit($id)
       {
        $data = [
            'title'      => 'Edit Air Minum',
            'airminum'   => $this->airModel->find($id),
            'jenis_air'  => $this->jenisModel->findAll()
        ];

        return view('airminum/edit', $data);
    }
      /*
       | =================================================|
       | Fungsi untuk mengubah data ubah kedalam database |
       | =================================================| 
      */ 
       public function update($id)
       {
        $this->airModel->update($id, [
            'nama_air_minum' => $this->request->getPost('nama_air_minum'),
            'harga'          => $this->request->getPost('harga'),
        // stok tidak diubah lewat update biasa
            'id_jenis_air'   => $this->request->getPost('id_jenis_air'),
        ]);

        return redirect()->to('/airminum')->with('success', 'Data berhasil diperbarui.');
    }

/*
 | =======================================|
 | Fungsi khusus untuk menambah stok saja |
 | =======================================|
*/
 public function tambahStok($id)
 {
    $jumlahTambah = $this->request->getPost('jumlah_tambah');
    
    $air = $this->airModel->find($id);
    if (!$air) {
        return redirect()->back()->with('error', 'Data tidak ditemukan.');
    }

    // hitung stok baru
    $stokBaru = $air['stok'] + (int)$jumlahTambah;

    $this->airModel->update($id, ['stok' => $stokBaru]);

    return redirect()->to('/airminum')->with('success', 'Stok berhasil ditambahkan.');
}

      /*
       | =============================================|
       | Fungsi untuk menghapus data kedalam database |
       | =============================================| 
      */ 
       public function delete($id)
       {
        $this->airModel->delete($id);
        return redirect()->to('/airminum')->with('success', 'Data berhasil dihapus.');
    }

    public function validasiStok()
    {
        $airMinumModel = new \App\Models\AirMinumModel();

    // join supaya bisa ambil nama_jenis
        $data['airminum'] = $airMinumModel
        ->select('air_minum.*, jenis_air_minum.nama_jenis')
        ->join('jenis_air_minum', 'jenis_air_minum.id_jenis_air = air_minum.id_jenis_air', 'left')
        ->findAll();

        return view('airminum/validasistok', $data);
    }


    // proses simpan validasi stok
    public function simpanValidasiStok()
    {
        $id = $this->request->getPost('id_airminum');
        $tambah = (int) $this->request->getPost('tambah_stok');

        $air = $this->airModel->find($id);
        $stokBaru = $air['stok'] + $tambah;

        $this->airModel->update($id, [
            'stok' => $stokBaru
        ]);

        return redirect()->to('/airminum/validasistok')->with('success', 'Stok berhasil divalidasi');
    }
    public function validasiStokStore()
    {
        $airMinumModel = new \App\Models\AirMinumModel();

    // Ambil data dari form
        $id_airminum = $this->request->getPost('id_airminum');
        $tambah_stok = $this->request->getPost('stok');

    // Cari data lama
        $airMinum = $airMinumModel->find($id_airminum);

        if (!$airMinum) {
            return redirect()->back()->with('error', 'Data air minum tidak ditemukan');
        }

    // Update stok = stok lama + tambahan
        $stokBaru = $airMinum['stok'] + (int)$tambah_stok;

        $airMinumModel->update($id_airminum, [
            'stok' => $stokBaru
        ]);

        return redirect()->to(base_url('airminum/validasistok'))
        ->with('success', 'Stok berhasil divalidasi (ditambahkan).');
    }

}
