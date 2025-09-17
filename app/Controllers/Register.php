<?php namespace App\Controllers;

use App\Models\LoginRoleModel;
use App\Models\PelangganModel;
use App\Models\JenisPelangganModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        $jenisModel = new JenisPelangganModel();
        $data['jenis'] = $jenisModel->findAll();
        return view('auth/register', $data); 
    }

    public function save()
    {
        helper(['form']);

        $rules = [
            'username'  => 'required|min_length[4]|is_unique[login_role.username]',
            'password'  => 'required|min_length[4]',
            'pass_confirm' => 'matches[password]',
            'nama'      => 'required',
            'telepon'   => 'required',
            'alamat'    => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $loginModel = new LoginRoleModel();
        $pelangganModel = new PelangganModel();

        /* <<menambahkkan data kedalam tabel kumpulan usrnm/pswrd (tabel login_role)>> */
        $id_role = $loginModel->insert([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_inti' => 'pelanggan'
        ]);

        /* <<Tabah ke tabel pelanggan>>*/
        $pelangganModel->save([
            'nama_pelanggan' => $this->request->getPost('nama'),
            'telepon'        => $this->request->getPost('telepon'),
            'alamat'         => $this->request->getPost('alamat'),
            'id_jenis_pelanggan' => $this->request->getPost('id_jenis_pelanggan'),
            'id_role'        => $id_role
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
