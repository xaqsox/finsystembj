<?php
namespace App\Models;

use CodeIgniter\Model;

class TrackingPesananModel extends Model
{
    protected $table = 'tracking_pesanan';
    protected $allowedFields = ['id_pengiriman', 'waktu', 'status_kirim', 'keterangan'];

    public function getByPemesanan($id_pemesanan)
    {
        return $this->select('tracking_pesanan.*, pengiriman.status_kirim')
                    ->join('pengiriman', 'pengiriman.id_pengiriman = tracking_pesanan.id_pengiriman')
                    ->where('pengiriman.id_pemesanan', $id_pemesanan)
                    ->orderBy('tracking_pesanan.waktu', 'ASC')
                    ->findAll();
    }
}
