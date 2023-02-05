<?php

require_once __DIR__ . '/vendors/autoload.php';

$user = $this->db->get('user')->result_array();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mobil</title>
</head>
<body>
    <h1>Data Member</h1>
    <table border="1" cellpadding="10" cellspacing="0" >
        <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>No_telepon</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Level</th>
        </tr>';
        foreach($user as $us){
            $html .= '<tr>
                <td>'. $us['id'].'</td>
                <td>'. $us['nama'] .'</td>
                <td>'. $us['No_telpon'] .'</td>
                <td>'. $us['tanggal_lahir'] .'</td>
                <td>'. $us['alamat'] .'</td>
                <td>'. $us['level'] .'</td>
                </tr>';
        }
$html .='</table>
</body>
</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('dataMember.pdf', \Mpdf\Output\Destination::DOWNLOAD);

?>

