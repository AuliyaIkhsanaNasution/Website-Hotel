<?php
require "../function/koneksi.php";
require '../../../../vendor/autoload.php';
session_start();

use Dompdf\Dompdf;

$path = 'logo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

$username = $_SESSION['user'];
$user = mysqli_query($conn, "SELECT * FROM pegawai JOIN posisi ON posisi.posisi_id = pegawai.posisi_id WHERE pegawai.username = '$username'");
$dataUser = mysqli_fetch_array($user);

// Mengambil data dari database
$query = "SELECT pegawai.pegawai_id, pegawai.email, pegawai.nama, pegawai.alamat, pegawai.no_telepon, posisi.posisi AS    nama_posisi
FROM pegawai
INNER JOIN posisi ON pegawai.posisi_id = posisi.posisi_id";
$hasil = $conn->query($query);

// Menyiapkan konten HTML
$html = '
<!DOCTYPE html>
<html>
<head>
    <style>
        .header {background-color: #93c5fd; text-align: left; }
        .header img { float: left; margin-right: 20px; }
        .header h1 { text-align: center; margin: 0; }
        .header p { text-align: center; margin: 0; }
        .content { text-align: center; margin: 0}
        .content h2 { text-align: center; margin: 0; }
        .content p { text-align: center; margin: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table th { background-color: ##c7d2fe; }
        table, th, td { border: 2px solid black; }
        th, td { padding: 10px; text-align: center; }
        .footer { margin-top: 50px; }
        .footer .left, .footer .right { display: inline-block; width: 45%; margin: 0;}
        .footer .right {float: right; text-align: right; margin:0 ; }
        .footer .left p, .footer .right p { margin: 0; }
        .footer .sign { margin-top: 30px; }
    </style>
</head>
<body>
    <div class="header">

        <h1>Hotel Nuansa Nusantara</h1>
        <p>Jl. Jamin Ginting No. 123, Kota Medan, Indonesia</p>
        <p>Telepon: 0123-456789</p>
        <hr>
    </div>
    <div class="content">
        <h2>Data Pegawai</h2>
        <p>Periode: ' . date('F Y') . '</p>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Posisi</th>
                </tr>
            </thead>
            <tbody>';

$num = 1;
while ($user = $hasil->fetch_assoc()) {
    $html .= '
    <tr>
        <td>' . $num++ . '</td>
        <td>' . $user['email'] . '</td>
        <td>' . $user['nama'] . '</td>
        <td>' . $user['alamat'] . '</td>
        <td>' . $user['no_telepon'] . '</td>
        <td>' . $user['nama_posisi'] . '</td>
    </tr>';
}

$html .= '
            </tbody>
        </table>
    </div>
    <div class="footer">
        <div class="left">
        <p>Disetujui oleh,</p>
            <p>Manajer</p>
            <div class="sign">(Doddy Susanto)</div>
        </div>
        <div class="right">
        <p>Medan, ' . date('d F Y') . '</p>
            <p>Dibuat Oleh</p>
            <p>' . $dataUser['posisi'] . '</p>
            <div class="sign">( ' . $dataUser['nama'] . ' )</div>
        </div>
    </div>
</body>
</html>';


// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('Data-Customer.pdf', array("Attachment" => false));
