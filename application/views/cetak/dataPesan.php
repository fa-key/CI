<?php

require_once __DIR__ . '/vendors/autoload.php';

$pesan = $this->db->get('sewamobil')->result_array();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pesanan</title>
</head>
<body>
    <h1>Data Pemesanan Mobil Rental</h1>
    <table border="1" cellpadding="10" cellspacing="0" >
        <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Merk</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Biaya</th>
                        <th>Pembayaran</th>
                        <th>Status</th>
        </tr>';
        foreach($pesan as $sw){
            $html .= '<tr>
                <td>'. $sw["id"] .'</td>
                <td>'. $sw["nama"] .'</td>
                <td>'. $sw["merkMobil"] .'</td>
                <td>'. $sw["tgl_pinjam"] .'</td>
                <td>'. $sw["tgl_kembali"] .'</td>
                <td>'. $sw["biaya"] .'</td>
                <td>'. $sw["pembayaran"] .'</td>
                <td>'. $sw["status"] .'</td>

                </tr>';
        }
$html .='</table>
<br>
<p>keterangan:</p>
<ol>
    <li>Pembayaran
        <ul>
            <li>0: Belum Lunas</li>
            <li>1: Lunas</li>
        </ul>
    </li>
    <li>Status
        <ul>
            <li>0: Belum Dikembalikan</li>
            <li>1: Dikembalikan</li>
        </ul>
    </li>
</ol>
</body>
</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('dataPemesanan.pdf', \Mpdf\Output\Destination::DOWNLOAD);

?>

