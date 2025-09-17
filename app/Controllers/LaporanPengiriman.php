<?php

namespace App\Controllers;

use App\Models\PengirimanModel;
use Dompdf\Dompdf;

class LaporanPengiriman extends BaseController
{
    public function index()
    {
        $model = new PengirimanModel();

        $tanggal_awal = $this->request->getGet('tanggal_awal');
        $tanggal_akhir = $this->request->getGet('tanggal_akhir');

        if ($tanggal_awal && $tanggal_akhir) {
            $data['pengiriman'] = $model->getLaporanByTanggal($tanggal_awal, $tanggal_akhir);
        } else {
            $data['pengiriman'] = $model->getAllLaporan();
        }

        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;

        return view('laporan/pengiriman', $data);
    }

    public function pdf()
    {
        $model = new PengirimanModel();

        $tanggal_awal = $this->request->getGet('tanggal_awal');
        $tanggal_akhir = $this->request->getGet('tanggal_akhir');

        if ($tanggal_awal && $tanggal_akhir) {
            $data['pengiriman'] = $model->getLaporanByTanggal($tanggal_awal, $tanggal_akhir);
        } else {
            $data['pengiriman'] = $model->getAllLaporan();
        }

        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;

        $dompdf = new Dompdf();
        $html = view('laporan/pdfkirim', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("laporan_pengiriman.pdf", ["Attachment" => false]);
    }
}
