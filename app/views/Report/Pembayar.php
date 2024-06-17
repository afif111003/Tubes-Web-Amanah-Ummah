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
$query = "SELECT pembayar.*, masjid.nama_masjid FROM t_pembayar as pembayar
INNER JOIN t_masjid as masjid on masjid.id_masjid = pembayar.id_masjid";
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
    <title>Laporan Muzakki</title>
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
    <h2 align="center">Laporan Muzakki</h2>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pembayar</th>
                <th>Alamat Pembayar</th>
                <th>No. Handphone</th>
                <th>Nama Masjid</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data['pnr'] as $pnr) :
            ?>
            <tr>
                <td><?= $no++ ?>.</td>
                <td><?= $pnr['nama_pembayar'];?></td>
                <td><?= $pnr['alamat_pembayar'];?></td>
                <td><?= $pnr['no_hp_pembayar'];?></td>
                <td><?= $pnr['nama_masjid'];?></td>
            </tr>
            <?php endforeach; ?>
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
            <td style="border:none"><div align="center"></div></td>
            <td style="border:none">&nbsp;</td>
            <td width="352" style="border:none">&nbsp;</td>
            <td style="border:none"><div align="center"></div></td>
        </tr>
        <tr style="border:none">
            <td style="border:none"><div align="center"></div></td>
            <td style="border:none">&nbsp;</td>
            <td width="352" style="border:none">&nbsp;</td>
            <td style="border:none"><div align="center"></div></td>
        </tr>
        <tr style="border:none">
            <td style="border:none"><div align="center"></div></td>
            <td style="border:none">&nbsp;</td>
            <td width="352" style="border:none">&nbsp;</td>
            <td style="border:none"><div align="center"></div></td>
        </tr>
        <tr style="border:none">
            <td style="border:none"><div align="center"><u>&nbsp;</u></div></td>
            <td style="border:none">&nbsp;</td>
            <td width="352" style="border:none">&nbsp;</td>
            <td style="border:none"><pre><div align="center"> <u>Hamba Allah</u> </div></pre></td>
        </tr>
    </table>
</body>
</html>
