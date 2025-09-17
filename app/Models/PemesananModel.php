<?php namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $allowedFields = ['tanggal_pesan', 'total', 'id_pelanggan','status_pemesanan'];
    protected $useTimestamps = false;

    public function getWithPelanggan()
    {
        return $this->select('pemesanan.*, pelanggan.nama_pelanggan')
                    ->join('pelanggan', 'pelanggan.id_pelanggan = pemesanan.id_pelanggan')
                    ->orderBy('pemesanan.tanggal_pesan', 'DESC')
                    ->findAll();
    }

    public function getReport(?string $start = null, ?string $end = null): array
    {
        $builder = $this->db->table($this->table . ' p');
        $builder->select('p.id_pemesanan, p.tanggal_pesan, p.total, p.id_pelanggan');

        // === Kalau kamu punya tabel pelanggan dengan kolom nama, AKTIFKAN baris di bawah dan sesuaikan kolomnya ===
        // $builder->select('pl.nama_pelanggan AS nama_pelanggan'); // atau 'pl.nama AS nama_pelanggan'
        // $builder->join('pelanggan pl', 'pl.id_pelanggan = p.id_pelanggan', 'left');

        if ($start && $end) {
            $builder->where('p.tanggal_pesan >=', $start)
                    ->where('p.tanggal_pesan <=', $end);
        }

        $builder->orderBy('p.tanggal_pesan', 'DESC');

        return $builder->get()->getResultArray();
    }
}
