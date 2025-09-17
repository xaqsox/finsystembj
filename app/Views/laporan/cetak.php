<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
        }
        h2 {
            text-align: center;
            margin-bottom: 5px;
        }
        p {
            text-align: center;
            margin-top: 0;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table th, table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        table th {
            background-color: #ffc107;
            color: #000;
            text-align: center;
        }
        .right {
            text-align: right;
        }
    </style>
</head>
<body>

    <h2>Laporan Pemesanan</h2>
    <p>Periode: 
        <?= !empty($_GET['start_date']) ? date('d-m-Y', strtotime($_GET['start_date'])) : '-' ?> 
        s/d 
        <?= !empty($_GET['end_date']) ? date('d-m-Y', strtotime($_GET['end_date'])) : '-' ?>
    </p>

    <table>
        <thead>
            <tr>
                <th style="width:5%;">#</th>
                <th style="width:25%;">Tanggal Pesan</th>
                <th style="width:30%;">Pelanggan</th>
                <th style="width:20%;">Total</th>
                <th style="width:20%;">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($laporan)): ?>
                <?php foreach ($laporan as $i => $row): ?>
                    <tr>
                        <td style="text-align:center;"><?= $i + 1 ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($row['tanggal_pesan'])) ?></td>
                        <td>ID: <?= $row['id_pelanggan'] ?></td>
                        <td class="right">Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                        <td style="text-align:center;"><?= ucfirst($row['status_pemesanan']) ?></td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align:center;">Tidak ada data</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>

</body>
</html>
