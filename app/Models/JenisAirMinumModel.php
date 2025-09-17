<?php namespace App\Models;

use CodeIgniter\Model;

class JenisAirMinumModel extends Model
{
    protected $table = 'jenis_air_minum';
    protected $primaryKey = 'id_jenis_air';
    protected $allowedFields = ['nama_jenis', 'deskripsi'];
}
