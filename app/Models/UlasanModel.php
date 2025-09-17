<?php

namespace App\Models;

use CodeIgniter\Model;

class UlasanModel extends Model
{
    protected $table            = 'ulasan';
    protected $primaryKey       = 'id_ulasan';
    protected $allowedFields    = ['id_pemesanan', 'id_pelanggan', 'rating', 'komentar', 'created_at'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

}
