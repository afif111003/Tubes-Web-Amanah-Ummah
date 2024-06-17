<?php
ob_start();
//Koneksi ke database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan Infak</title>
    <style>
        td {
            padding: 3px 5px 3px 5px;
            border-right: 1px solid #666666;
            border-bottom: 1px solid #666666;
        }
        
        .head td {
            font-weight: bold;
            font-size: 12px;
            background: #b7f0ff; 
        }
        
        table .main tbody tr td {
            font-size: 12px;
        }
        
        table, table .main {
            width: 100%;
            border-top: 1px solid #666;
            border-left: 1px solid #666;
            border-collapse: collapse;
            background: #fff;
        }
        
        h1 {
            font-size:20px;
        }
    </style>
</head>
<body>
    <h2 align="center">Laporan Keuangan Infak</h2>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pembayar</th>
                <th>Tanggal Pembayar</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $grandtotal = 0;
            foreach( $data['pnr'] as $pnr) : 
                $grandtotal = $grandtotal+$pnr['total_infak'];
            ?>
            <tr>
                <td><?= $no++ ?>.</td>
                <td><?= $pnr['nama_pembayar'];?></td>
                <td><?= $pnr['tgl_infak'];?></td>
                <td align="right">Rp.<?= number_format($pnr['total_infak']);?></td>
            </tr>
            <?php endforeach; ?>    
            <tr>
                <td colspan="3" align="right"><b>Grand Total</b></td>
                <td align="right"><b>Rp. <?= number_format($grandtotal);?></b></td>
            </tr>  
        </tbody>
    </table>
    <br />
    <?php
    date_default_timezone_set('Asia/Jakarta');
    ?>
    <table width="787" cellpadding=0 cellspacing=0 style="border:none;" align="center">
        <!-- Tanggal dan tanda tangan -->
    </table>
</body>
</html>
