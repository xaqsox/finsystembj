<?php namespace App\Controllers;

use App\Models\KurirModel;
use App\Models\JenisKendaraanModel;
use App\Models\LoginRoleModel;
use CodeIgniter\Controller;

class Kurir extends Controller
{
    protected $kurirModel;
    protected $kendaraanModel;
    protected $roleModel;

    public function __construct()
    {
        $this->kurirModel = new KurirModel();
        $this->kendaraanModel = new JenisKendaraanModel();
        $this->roleModel = new LoginRoleModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kurir',
            'kurir' => $this->kurirModel->getWithKendaraan()
        ];
        return view('kurir/index', $data);
    }

    public function create()
    {
        $data = [
            'kendaraan' => $this->kendaraanModel->findAll()
        ];
        return view('kurir/create', $data);
    }

    public function store()
    {
     
        $this->roleModel->insert([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_inti' => 'kurir'
        ]);
        $idRole = $this->roleModel->insertID(); // ambil ID-nya

        $this->kurirModel->insert([
            'nama_kurir' => $this->request->getPost('nama_kurir'),
            'telepon' => $this->request->getPost('telepon'),
            'id_kendaraan' => $this->request->getPost('id_kendaraan'),
            'id_role' => $idRole
        ]);

        return redirect()->to('/kurir');
    }

    public function edit($id)
    {
        $data = [
            'kurir' => $this->kurirModel->find($id),
            'kendaraan' => $this->kendaraanModel->findAll()
        ];
        return view('kurir/edit', $data);
    }

    public function update($id)
    {
        $this->kurirModel->update($id, [
            'nama_kurir' => $this->request->getPost('nama_kurir'),
            'telepon' => $this->request->getPost('telepon'),
            'id_kendaraan' => $this->request->getPost('id_kendaraan')
    
        ]);

        return redirect()->to('/kurir');
    }

    public function delete($id)
    {
        $kurir = $this->kurirModel->find($id);
        if ($kurir && $kurir['id_role']) {
            $this->roleModel->delete($kurir['id_role']); 
        }
        $this->kurirModel->delete($id);
        return redirect()->to('/kurir');
    }
}
