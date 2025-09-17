<?php

namespace App\Controllers;

use App\Models\LoginRoleModel;
use App\Models\PelangganModel;
use App\Models\JenisPelangganModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    protected $loginModel;
    protected $pelangganModel;
    protected $jenisModel;
    protected $session;

    /*  Controller : Auth.php                                                
      |--------------------------------------------------------------------------|
      | Berfungsi Untuk mengatur antara view/model login/register                |
      |--------------------------------------------------------------------------|
     */ 
    public function __construct()
    {
        $this->loginModel     = new LoginRoleModel();
        $this->pelangganModel = new PelangganModel();
        $this->jenisModel     = new JenisPelangganModel();
        $this->session        = session();
        helper(['form', 'url']);
    }

    public function index()
    {
        return view('auth/login');
    }

    // <== Memproses Login ==> \\
    public function doLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->loginModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
        // <== Jika Hak Akses adalah Pelanggan ==> \\
            if ($user['role_inti'] == 'pelanggan') {
                $pelanggan = $this->pelangganModel
                ->where('id_role', $user['id_role'])
                ->first();
                $this->session->set('id_pelanggan', $pelanggan['id_pelanggan']);
            }

        // <== Jika Hak Akses adalah Kurir ==> \\
            if ($user['role_inti'] == 'kurir') {
                $kurir = model('KurirModel')
                ->where('id_role', $user['id_role'])
                ->first();
                $this->session->set('id_kurir', $kurir['id_kurir']);
            }
            $this->session->set([
                'id_role'   => $user['id_role'],
                'username'  => $user['username'],
                'role_inti' => $user['role_inti'],
                'logged_in' => true
            ]);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Username atau password salah.');
        }
    }


    // <== Fungsi Logout ==> \\
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }

    // <== Register ==> \\
    public function register()
    {
        $data['jenis'] = $this->jenisModel->findAll();
        return view('auth/register', $data);
    }

    // <== Proses simpan register kedalam data pelanggan ==> \\
    public function store()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'username'      => 'required|is_unique[login_role.username]',
            'password'      => 'required|min_length[6]',
            'nama_pelanggan'=> 'required',
            'telepon'       => 'required',
            'alamat'        => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        // <-- 1. Simpan ke login_role --> \\
        $this->loginModel->save([
            'username'  => $this->request->getPost('username'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_inti' => 'pelanggan'
        ]);

        // <-- 2. Ambil ID login_role terbaru --> \\
        $id_role = $this->loginModel->getInsertID();

        // <-- 3. Simpan ke tabel pelanggan --> \\
        $this->pelangganModel->save([
            'nama_pelanggan'      => $this->request->getPost('nama_pelanggan'),
            'telepon'             => $this->request->getPost('telepon'),
            'alamat'              => $this->request->getPost('alamat'),
            'id_role'             => $id_role,
            'id_jenis_pelanggan'  => $this->request->getPost('id_jenis_pelanggan') ?? 1
        ]);

        return redirect()->to('/')->with('success', 'Pendaftaran berhasil, silakan login.');
    }
}
