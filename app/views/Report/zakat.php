<?php
// Koneksi ke database
// (Sesuaikan dengan cara koneksi yang Anda gunakan)
$koneksi = mysqli_connect("localhost", "root", "", "zakat");

// Jika koneksi gagal, tampilkan pesan error
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Ambil data dari database
$query = "SELECT 
pembayaran.*,
pembayar.nama_pembayar, 
amil.nama_amil,
zakat.jenis_zakat
FROM 
t_pembayaran AS pembayaran
INNER JOIN 
t_pembayar AS pembayar ON pembayar.id_pembayar = pembayaran.id_pembayar
INNER JOIN 
t_zakat AS zakat ON zakat.id_zakat = pembayaran.id_zakat  
INNER JOIN
t_amil AS amil ON amil.id_amil = pembayaran.id_amil;";
$result = mysqli_query($koneksi, $query);

// Simpan hasil query dalam array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data['pnr'][] = $row;
}

// Mulai output HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan Zakat</title>
    <style>
        /* Gaya CSS Anda */
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
    <h2 align="center">Laporan Keuangan Zakat</h2>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Penyerahan</th>
                <th>Nama Pembayar</th>
                <th>Jenis Zakat</th>
                <th>Pembayaran Beras</th>
                <th>Pembayaran Uang</th>
                <th>Jumlah Tanggungan</th>       
                <th>Total Pembayaran</th>
                <th>Nama Amil</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $total_beras = 0;
            $total_uang = 0;
            foreach ($data['pnr'] as $pnr) :
            ?>
            <tr>
                <td><?= $no++ ?>.</td>
                <td><?= $pnr['tgl_penyerahan'];?></td>
                <td><?= $pnr['nama_pembayar'];?></td>
                <td><?= $pnr['jenis_zakat'];?></td>
                <td align="right"><?= $pnr['pembayaran_beras'];?> Kg.</td>
                <td align="right">Rp.<?= number_format($pnr['pembayaran_uang']);?></td>
                <td align="center"><?= $pnr['jumlah_tanggungan'];?></td>
                <?php
                    $jml = $pnr['total_pembayaran'];
                    $jml2 = strlen($jml);
                    if ($jml2 <= 4 ) { 
                        $total_beras = $total_beras+$pnr['total_pembayaran']; 
                ?>
                <td align="right"><?= $pnr['total_pembayaran'];?> Kg</td>
                <?php 
                    } else { 
                        $total_uang = $total_uang+$pnr['total_pembayaran']; 
                ?>
                <td align="right">Rp. <?= number_format($pnr['total_pembayaran']);?></td>
                <?php } ?>
                <td><?= $pnr['nama_amil'];?></td>
            </tr>
            <?php endforeach; ?>  
            <tr>
                <td align="right" colspan="7"><b>Grand Total</b></td>    
                <td align="right">
                    <b>Beras: </b><?= $total_beras;?> Kg<br>
                    <b>Uang: </b>Rp. <?= number_format($total_uang);?>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table width="787" cellpadding=0 cellspacing=0 style="border:none;" align="center">
        <!-- Tanggal dan tanda tangan -->
        <tr style="border:none">
            <td width="212" style="border:none"><div align="center">&nbsp;</div></td>
            <td width="352" style="border:none">&nbsp;</td>
            <td width="352" style="border:none">&nbsp;</td>
            <td width="209" style="border:none"><div align="center"><span class="style1">
            Pekanbaru, <?php echo date("d M Y");?>
            </span></div></td>
        </tr>
        <tr style="border:none">
            <td width="212" style="border:none"><div align="center">&nbsp;</div></td>
            <td width="352" style="border:none">&nbsp;</td>
            <td width="352" style="border:none">&nbsp;</td>
            <td width="209" style="border:none"><div align="center">Ketua Amil Zakat</div></td>
        </tr>
        
        <tr style="border:none">
            <td style="border:none"><
