<?php

namespace App\Controllers;

use App\Models\KurirModel;
use App\Models\LoginRoleModel;
use CodeIgniter\Controller;

class ProfileKurir extends Controller
{
    protected $kurirModel;
    protected $loginRoleModel;

    public function __construct()
    {
        $this->kurirModel = new KurirModel();
        $this->loginRoleModel = new LoginRoleModel();
        helper(['form', 'url']);
    }

    public function edit()
    {
        $id_kurir = session()->get('id_kurir');

        $data['kurir'] = $this->kurirModel
            ->select('kurir.*, login_role.username')
            ->join('login_role', 'login_role.id_role = kurir.id_role')
            ->where('kurir.id_kurir', $id_kurir)
            ->first();

        return view('profilekurir/edit', $data);
    }

    public function update()
    {
        $id_kurir = session()->get('id_kurir');

        /* <<Ambil data kurir untuk dapat id_role>> */
        $kurir = $this->kurirModel->find($id_kurir);

        if (!$kurir) {
            return redirect()->back()->with('error', 'Data kurir tidak ditemukan.');
        }

        /* <<Update tabel kurir>> */
        $this->kurirModel->update($id_kurir, [
            'nama_kurir' => $this->request->getPost('nama_kurir'),
            'telepon'    => $this->request->getPost('telepon'),
        ]);

        /* <<Update tabel login_role (username + password jika ada perubahan)>> */
        $updateData = [
            'username' => $this->request->getPost('username'),
        ];

        if ($this->request->getPost('password')) {
            $updateData['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->loginRoleModel->update($kurir['id_role'], $updateData);

        return redirect()->to('/profilekurir/edit')->with('success', 'Profil berhasil diperbarui.');
    }
}
