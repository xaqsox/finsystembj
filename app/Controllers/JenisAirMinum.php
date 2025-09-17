<?php namespace App\Controllers;

use App\Models\JenisAirMinumModel;
use CodeIgniter\Controller;

class JenisAirMinum extends Controller
{
    protected $jenisModel;

    public function __construct()
    {
        $this->jenisModel = new JenisAirMinumModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data['title'] = 'Jenis Air Minum';
        $data['jenis'] = $this->jenisModel->findAll();
        return view('jenis4ir3inum/index', $data);
    }

    public function create()
    {
        return view('jenis4ir3inum/create');
    }

    public function store()
    {
        $this->jenisModel->save([
            'nama_jenis' => $this->request->getPost('nama_jenis'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);
        return redirect()->to('/jenis4ir3inum');
    }

    public function edit($id)
    {
        $data['jenis'] = $this->jenisModel->find($id);
        return view('jenis4ir3inum/edit', $data);
    }

    public function update($id)
    {
        $this->jenisModel->update($id, [
            'nama_jenis' => $this->request->getPost('nama_jenis'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);
        return redirect()->to('/jenis4ir3inum');
    }

    public function delete($id)
    {
        $this->jenisModel->delete($id);
        return redirect()->to('/jenis4ir3inum');
    }
}
