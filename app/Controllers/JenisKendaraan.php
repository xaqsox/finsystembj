<?php namespace App\Controllers;

use App\Models\JenisKendaraanModel;
use CodeIgniter\Controller;

class JenisKendaraan extends Controller
{
    protected $jenisModel;

    public function __construct()
    {
        $this->jenisModel = new JenisKendaraanModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'title' => 'Jenis Kendaraan',
            'jenis' => $this->jenisModel->findAll()
        ];
        return view('jeniskendaraan/index', $data);
    }

    public function create()
    {
        return view('jeniskendaraan/create');
    }

    public function store()
    {
        $this->jenisModel->save([
            'nama_jenis_kendaraan' => $this->request->getPost('nama_jenis_kendaraan'),
            'nomor_polisi' => $this->request->getPost('nomor_polisi')
        ]);
        return redirect()->to('/jeniskendaraan');
    }

    public function edit($id)
    {
        $data = [
            'jenis' => $this->jenisModel->find($id)
        ];
        return view('jeniskendaraan/edit', $data);
    }

    public function update($id)
    {
        $this->jenisModel->update($id, [
            'nama_jenis_kendaraan' => $this->request->getPost('nama_jenis_kendaraan'),
            'nomor_polisi' => $this->request->getPost('nomor_polisi')
        ]);
        return redirect()->to('/jeniskendaraan');
    }

    public function delete($id)
    {
        $this->jenisModel->delete($id);
        return redirect()->to('/jeniskendaraan');
    }
}
