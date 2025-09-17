<?php

namespace App\Controllers;

use App\Models\JenisPelangganModel;
use CodeIgniter\Controller;

class JenisPelanggan extends Controller
{
    protected $jenisModel;

    public function __construct()
    {
        $this->jenisModel = new JenisPelangganModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data['title'] = 'Jenis Pelanggan';
        $data['jenis'] = $this->jenisModel->findAll();
        return view('jenispelanggan/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Jenis Pelanggan';
        return view('jenispelanggan/create', $data);
    }

    public function store()
    {
        $this->jenisModel->save([
            'nama_jenis' => $this->request->getPost('nama_jenis'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('/jenispelanggan');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Jenis Pelanggan';
        $data['jenis'] = $this->jenisModel->find($id);
        return view('jenispelanggan/edit', $data);
    }

    public function update($id)
    {
        $this->jenisModel->update($id, [
            'nama_jenis' => $this->request->getPost('nama_jenis'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        session()->setFlashdata('success', 'Data berhasil diperbarui.');
        return redirect()->to('/jenispelanggan');
    }

    public function delete($id)
    {
        $this->jenisModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/jenispelanggan');
    }
}
