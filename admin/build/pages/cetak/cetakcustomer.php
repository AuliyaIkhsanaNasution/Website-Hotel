<?php
require "../function/koneksi.php";
require '../../../vendor/autoload.php';

use Dompdf\Dompdf;

// Mengambil data dari database
$query = "SELECT * FROM user";
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
        <img src="../../assets/img/logo.png" alt="Logo" width="100">
        <h1>Hotel Nuansa Nusantara</h1>
        <p>Jl. Contoh Alamat No. 123, Kota, Negara</p>
        <p>Telepon: 0123-456789</p>
        <hr>
    </div>
    <div class="content">
        <h2>Data Customer</h2>
        <p>Periode: ' . date('F Y') . '</p>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                </tr>
            </thead>
            <tbody>';

$num = 1;
while ($user = $hasil->fetch_assoc()) {
    $html .= '
    <tr>
        <td>' . $num++ . '</td>
        <td>' . $user['nik'] . '</td>
        <td>' . $user['email'] . '</td>
        <td>' . $user['nama'] . '</td>
        <td>' . $user['alamat'] . '</td>
        <td>' . $user['no_telepon'] . '</td>
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
            <div class="sign">(_________________)</div>
        </div>
        <div class="right">
        <p>Medan, ' . date('d F Y') . '</p>
            <p>Dibuat Oleh</p>
            <p>Pimpinan</p>
            <div class="sign">(_________________)</div>
        </div>
    </div>
</body>
</html>';

// Inisialisasi Dompdf
$dompdf = new Dompdf();

// Load konten HTML ke Dompdf
$dompdf->loadHtml($html);

// Set ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');

// Render konten HTML ke PDF
$dompdf->render();

// Output file PDF ke browser
$dompdf->stream('Data_Customer.pdf', array("Attachment" => false));
?>
