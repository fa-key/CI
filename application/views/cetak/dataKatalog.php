<?php

require_once __DIR__ . '/vendors/autoload.php';

$mobil = $this->db->get('mobil')->result_array();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mobil</title>
</head>
<body>
    <h1>Data Katalog Mobil Rental</h1>
    <table border="1" cellpadding="10" cellspacing="0" >
        <tr>
                        <th>ID</th>
                        <th>Merk</th>
                        <th>Lokasi</th>
                        <th>Kapasitas</th>
                        <th>Warna</th>
                        <th>Gambar</th>
                        <th>harga</th>
                        <th>Stok</th>
        </tr>';
        foreach($mobil as $mb){
            $html .= '<tr>
                <td>'. $mb["id"] .'</td>
                <td>'. $mb["merk"] .'</td>
                <td>'. $mb["lokasi"] .'</td>
                <td>'. $mb["kapasitas"] .'</td>
                <td>'. $mb["warna"] .'</td>
                <td> <img src="'.base_url('assets/images/').$mb["gambar"].'" width="100"></td>
                <td>'. $mb["harga"] .'</td>
                <td>'. $mb["stok"] .'</td>
                </tr>';
        }
$html .='</table>
</body>
</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('dataKatalog.pdf', \Mpdf\Output\Destination::DOWNLOAD);

?>

