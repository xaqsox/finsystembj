<?php namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $allowedFields = ['nama_pelanggan', 'alamat', 'telepon', 'id_jenis_pelanggan', 'id_role'];

    public function getWithJenis()
    {
        return $this->select('pelanggan.*, jenis_pelanggan.nama_jenis')
            ->join('jenis_pelanggan', 'jenis_pelanggan.id_jenis_pelanggan = pelanggan.id_jenis_pelanggan')
            ->findAll();
    }
}
