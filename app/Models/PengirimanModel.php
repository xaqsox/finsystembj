<?php namespace App\Models;

use CodeIgniter\Model;

class PengirimanModel extends Model
{
    protected $table            = 'pengiriman';
    protected $primaryKey       = 'id_pengiriman';
    protected $allowedFields    = ['id_pemesanan', 'id_kurir', 'tanggal_kirim', 'status_kirim'];

    public function getLaporanPengiriman()
    {
        return $this->select('pengiriman.*, pemesanan.id_pemesanan, kurir.nama_kurir')
                    ->join('pemesanan', 'pemesanan.id_pemesanan = pengiriman.id_pemesanan')
                    ->join('kurir', 'kurir.id_kurir = pengiriman.id_kurir')
                    ->orderBy('tanggal_kirim', 'DESC')
                    ->findAll();
    }

     public function getAllLaporan()
    {
        return $this->select('pengiriman.*, pemesanan.id_pemesanan, kurir.nama_kurir')
            ->join('pemesanan', 'pemesanan.id_pemesanan = pengiriman.id_pemesanan')
            ->join('kurir', 'kurir.id_kurir = pengiriman.id_kurir')
            ->orderBy('tanggal_kirim', 'DESC')
            ->findAll();
    } 

   public function getLaporanByTanggal($awal, $akhir)
    {
        return $this->select('pengiriman.*, pemesanan.id_pemesanan, kurir.nama_kurir')
            ->join('pemesanan', 'pemesanan.id_pemesanan = pengiriman.id_pemesanan')
            ->join('kurir', 'kurir.id_kurir = pengiriman.id_kurir')
            ->where('DATE(tanggal_kirim) >=', $awal)
            ->where('DATE(tanggal_kirim) <=', $akhir)
            ->orderBy('tanggal_kirim', 'DESC')
            ->findAll();
    } 
}
