<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisPelangganModel extends Model
{
    protected $table = 'jenis_pelanggan';
    protected $primaryKey = 'id_jenis_pelanggan';
    protected $allowedFields = ['nama_jenis', 'deskripsi'];
}
