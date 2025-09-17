<?php
namespace App\Models;

use CodeIgniter\Model;

class JenisKendaraanModel extends Model
{
    protected $table = 'jenis_kendaraan';
    protected $primaryKey = 'id_jenis_kendaraan';
    protected $allowedFields = ['nama_jenis_kendaraan', 'nomor_polisi'];
}
