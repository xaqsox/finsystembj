<?php namespace App\Models;

use CodeIgniter\Model;

class DetailPemesananModel extends Model
{
    protected $table = 'detail_pesanan';
    protected $primaryKey = 'id_detail_pesanan';
    protected $allowedFields = ['id_pemesanan', 'id_air_minum', 'jumlah', 'subtotal'];
    protected $useTimestamps = false;
}
