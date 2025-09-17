<?php
namespace App\Models;

use CodeIgniter\Model;

class LoginRoleModel extends Model
{
    protected $table = 'login_role';
    protected $primaryKey = 'id_role';
    protected $allowedFields = ['username', 'password', 'role_inti'];

    public function checkLogin($username)
    {
        return $this->where('username', $username)->first();
    }
}
