<?php namespace App\Models;

use CodeIgniter\Model;

class KurirModel extends Model
{
    protected $table = 'kurir';
    protected $primaryKey = 'id_kurir';
    protected $allowedFields = ['nama_kurir', 'telepon', 'id_role', 'id_kendaraan', 'created_at', 'updated_at'];

    public function getWithKendaraan()
    {
        return $this->select('kurir.*, jenis_kendaraan.nama_jenis_kendaraan')
                    ->join('jenis_kendaraan', 'jenis_kendaraan.id_jenis_kendaraan = kurir.id_kendaraan', 'left')
                    ->findAll();
    }
}
