<?php

namespace App\Controllers;

use App\Models\PemesananModel;

class Laporan extends BaseController
{
    public function index()
{
    $model = new PemesananModel();
    $data['laporan'] = [];

    $start_date = $this->request->getGet('start_date');
    $end_date   = $this->request->getGet('end_date');

    if (!empty($start_date) && !empty($end_date)) {
        $data['laporan'] = $model->where('tanggal_pesan >=', $start_date . ' 00:00:00')
                                 ->where('tanggal_pesan <=', $end_date . ' 23:59:59')
                                 ->findAll();
    } else {
        $data['laporan'] = $model->findAll();
    }

    $data['start_date'] = $start_date;
    $data['end_date']   = $end_date;

    return view('laporan/index', $data);
}

public function cetak_pdf()
{
    $model = new PemesananModel();
    $start_date = $this->request->getGet('start_date');
    $end_date   = $this->request->getGet('end_date');

    if (!empty($start_date) && !empty($end_date)) {
        $laporan = $model->where('tanggal_pesan >=', $start_date . ' 00:00:00')
                         ->where('tanggal_pesan <=', $end_date . ' 23:59:59')
                         ->findAll();
    } else {
        $laporan = $model->findAll();
    }

    $dompdf = new \Dompdf\Dompdf();
    $html = view('laporan/cetak', ['laporan' => $laporan]);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('laporan_pemesanan.pdf');
}

}
