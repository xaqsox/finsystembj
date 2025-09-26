<?php
namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\LoginRoleModel;

class Profile extends BaseController
{
    protected $pelangganModel;
    protected $loginRoleModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
        $this->loginRoleModel = new LoginRoleModel();
    }

    public function index()
    {
        $idRole = session()->get('id_role');
        $pelanggan = $this->pelangganModel->where('id_role', $idRole)->first();
        $login = $this->loginRoleModel->find($idRole);

        return view('profile/index', [
            'pelanggan' => $pelanggan,
            'login' => $login
        ]);
    }

    public function update()
    {
        $idRole = session()->get('id_role');
        $pelanggan = $this->pelangganModel->where('id_role', $idRole)->first();

      
        $this->pelangganModel->update($pelanggan['id_pelanggan'], [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'alamat'         => $this->request->getPost('alamat'),
            'telepon'        => $this->request->getPost('telepon'),
            'id_jenis_pelanggan' => $this->request->getPost('id_jenis_pelanggan')
        ]);


        $dataLogin = [
            'username' => $this->request->getPost('username')
        ];

        if ($this->request->getPost('password')) {
            $dataLogin['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->loginRoleModel->update($idRole, $dataLogin);

        return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui');
    }
}
