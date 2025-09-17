<!-- app/Views/laporan_pengiriman/cetak_pdf.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pengiriman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h3 {
            text-align: center;
            margin-bottom: 5px;
        }
        p {
            text-align: center;
            margin-top: 0;
            font-size: 11px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        th, td {
            padding: 6px;
            text-align: left;
        }
    </style>
</head>
<body>

    <h3>Laporan Pengiriman</h3>
    <p>Dicetak pada: <?= date('d-m-Y H:i:s') ?></p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pengiriman</th>
                <th>No. Pemesanan</th>
                <th>Kurir</th>
               
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pengiriman)) : ?>
                <?php $no = 1; foreach ($pengiriman as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= date('d-m-Y', strtotime($row['tanggal_kirim'])) ?></td>
                        <td><?= esc($row['id_pemesanan']) ?></td>
                        <td><?= esc($row['nama_kurir']) ?></td>
                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada data</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>

</body>
</html>
