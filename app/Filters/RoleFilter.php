<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $role = session()->get('role_inti');

        // Tidak login
        if (!$role) {
            return redirect()->to('/auth')->with('error', 'Silakan login terlebih dahulu');
        }

        // Tidak sesuai hak akses
        if (!in_array($role, $arguments)) {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
