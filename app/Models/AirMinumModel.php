<?php namespace App\Models;

use CodeIgniter\Model;

class AirMinumModel extends Model
{
    protected $table = 'air_minum';
    protected $primaryKey = 'id_air_minum';
    protected $allowedFields = ['nama_air_minum', 'harga', 'stok', 'id_jenis_air'];

    public function getWithJenis()
    {
        return $this->select('air_minum.*, jenis_air_minum.nama_jenis')
                    ->join('jenis_air_minum', 'jenis_air_minum.id_jenis_air = air_minum.id_jenis_air')
                    ->findAll();
    }

   
    public function kurangiStok($id_air_minum, $jumlah)
    {
        $air = $this->find($id_air_minum);

        if (!$air) {
            return false; // data tidak ditemukan
        }

        if ($air['stok'] < $jumlah) {
            return false; // stok tidak cukup
        }

        $newStok = $air['stok'] - $jumlah;

        return $this->update($id_air_minum, ['stok' => $newStok]);
    }
}
