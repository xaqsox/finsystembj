<?php namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\LoginRoleModel;
use App\Models\JenisPelangganModel;
use CodeIgniter\Controller;

class Pelanggan extends Controller
{
    protected $pelangganModel, $roleModel, $jenisModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
        $this->roleModel = new LoginRoleModel();
        $this->jenisModel = new JenisPelangganModel();
        helper(['form']);
    }

    public function index()
    {
        $data = [
            'title' => 'Pelanggan',
            'pelanggan' => $this->pelangganModel->getWithJenis()
        ];
        return view('pelanggan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Pelanggan',
            'jenis' => $this->jenisModel->findAll()
        ];
        return view('pelanggan/create', $data);
    }

    public function store()
    {
        $idRole = $this->roleModel->insert([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role_inti' => 'pelanggan'
        ], true);

        $this->pelangganModel->insert([
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'alamat'         => $this->request->getPost('alamat'),
            'telepon'        => $this->request->getPost('telepon'),
            'id_jenis_pelanggan' => $this->request->getPost('id_jenis_pelanggan'),
            'id_role'        => $idRole
        ]);

        return redirect()->to('/pelanggan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pelanggan',
            'pelanggan' => $this->pelangganModel->find($id),
            'jenis' => $this->jenisModel->findAll()
        ];
        return view('pelanggan/edit', $data);
    }

    public function update($id)
    {
        $this->pelangganModel->update($id, [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'alamat'         => $this->request->getPost('alamat'),
            'telepon'        => $this->request->getPost('telepon'),
            'id_jenis_pelanggan' => $this->request->getPost('id_jenis_pelanggan'),
        ]);
        return redirect()->to('/pelanggan');
    }

    public function delete($id)
    {
        $this->pelangganModel->delete($id);
        return redirect()->to('/pelanggan');
    }
}
