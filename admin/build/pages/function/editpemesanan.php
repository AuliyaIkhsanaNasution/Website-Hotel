<?php
require "koneksi.php"; // Mengimport file koneksi.php

$pemesanan_id = $_GET["id"];

// query data pegawai berdasarka id
$sql = "SELECT pemesanan.pemesanan_id, pemesanan.user_id, user.nik, user.nama, pemesanan.tanggal_pesan, pemesanan.tanggal_checkin, pemesanan.tanggal_checkout, pemesanan.jumlah_tamu, pemesanan.total_harga, pemesanan.status_pemesanan,
detailpemesanan.kamar_id, kamar.nomor_kamar, tipekamar.slug, detailpemesanan.tipe_kamar_id, tipekamar.nama_tipe, tipekamar.harga, detailpemesanan.harga_kamar_per_malam, detailpemesanan.fasilitas_plus 
FROM pemesanan
INNER JOIN detailpemesanan  ON pemesanan.pemesanan_id = detailpemesanan.pemesanan_id 
INNER JOIN user  ON pemesanan.user_id = user.user_id
INNER JOIN kamar  ON detailpemesanan.kamar_id = kamar.kamar_id
INNER JOIN tipekamar  ON kamar.tipe_kamar_id = tipekamar.tipe_kamar_id
WHERE pemesanan.pemesanan_id = '$pemesanan_id'";
$hasil = $conn->query($sql);

if (isset($_POST["ubah"])) {
    // Ambil data dari formulir dengan menggunakan fungsi htmlspecialchars untuk menghindari serangan XSS
    $pemesanan_id = htmlspecialchars($_POST["pemesanan_id"]);
    $nik = htmlspecialchars($_POST["nik"]);
    $tanggal_checkin = htmlspecialchars($_POST["tanggal_checkin"]);
    $tanggal_checkout = htmlspecialchars($_POST["tanggal_checkout"]);
    $jumlah_tamu = htmlspecialchars($_POST["jumlah_tamu"]);
    $status_pemesanan = htmlspecialchars($_POST["status_pemesanan"]);
    $kamar = isset($_POST["kamar"]) ? htmlspecialchars($_POST["kamar"]) : '';
    $tipe_kamar = isset($_POST["tipe_kamar"]) ? htmlspecialchars($_POST["tipe_kamar"]) : '';
    $harga_kamar = htmlspecialchars($_POST["harga_kamar"]);
    $fasilitas_plus = isset($_POST["fasilitas_plus"]) ? htmlspecialchars($_POST["fasilitas_plus"]) : '';

    // Debugging: Tampilkan nilai dari fasilitas_plus
    echo "Fasilitas Plus: " . $fasilitas_plus . "<br>";

    // Hitung selisih hari antara tanggal check-in dan check-out
    $tanggal_checkin_unix = strtotime($tanggal_checkin);
    $tanggal_checkout_unix = strtotime($tanggal_checkout);
    $selisih_hari = ($tanggal_checkout_unix - $tanggal_checkin_unix) / (60 * 60 * 24);

    // Hitung total harga berdasarkan harga kamar per malam dan jumlah malam menginap
    $total_harga = $harga_kamar * $selisih_hari;

    // Debugging: Tampilkan total harga sebelum biaya tambahan
    echo "Total Harga sebelum Biaya Tambahan: " . $total_harga . "<br>";

    // Jika fasilitas_plus adalah 'sarapan', tambahkan biaya tambahan sebesar 100.000 per hari
    if ($fasilitas_plus == 'Sarapan') {
        $biaya_sarapan_per_hari = 100000;
        $total_biaya_sarapan = $biaya_sarapan_per_hari * $selisih_hari;
        $total_harga += $total_biaya_sarapan; // Tambahkan biaya tambahan untuk sarapan
        // Debugging: Tampilkan biaya sarapan dan total harga setelah penambahan biaya
        echo "Biaya Sarapan: " . $total_biaya_sarapan . "<br>";
    }

    // Debugging: Tampilkan total harga setelah semua biaya tambahan
    echo "Total Harga setelah Biaya Tambahan: " . $total_harga . "<br>";

    // Lakukan query SQL untuk memperbarui data dalam tabel pemesanan
    $query_pemesanan = "UPDATE pemesanan SET user_id='$nik', tanggal_checkin='$tanggal_checkin', tanggal_checkout='$tanggal_checkout', jumlah_tamu='$jumlah_tamu', total_harga='$total_harga', status_pemesanan='$status_pemesanan' WHERE pemesanan_id='$pemesanan_id'";

    // Lakukan query untuk memperbarui data pemesanan
    if ($conn->query($query_pemesanan) === TRUE) {
        $query_detail_pemesanan = "UPDATE detailpemesanan SET kamar_id='$kamar', tipe_kamar_id='$tipe_kamar', harga_kamar_per_malam='$harga_kamar', fasilitas_plus='$fasilitas_plus' WHERE pemesanan_id='$pemesanan_id'";

        // Lakukan query untuk memperbarui data detail pemesanan
        if ($conn->query($query_detail_pemesanan) === TRUE) {
            header("location: ../datapemesanan.php?edit=true");
            exit; // Pastikan untuk keluar setelah redirect
        } else {
            echo "Error: " . $query_detail_pemesanan . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $query_pemesanan . "<br>" . $conn->error;
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="../../assets/img/logo.png" />
    <title>Form Edit Data Pemesanan</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="p-6 bg-blue-200">

<?php while ($edit = $hasil->fetch_assoc()) { ?> 
    
    <div class="max-w-xl p-8 mx-auto bg-yellow-100 rounded shadow-md outline outline-2 outline-offset-2 outline-yellow-500">
        <h2 class="mb-3 text-2xl font-bold text-center text-slate-600 ">Edit Data Pemesanan</h2>
        <h6 class="mb-5 text-sm text-slate-500 ">*harap isi Data Pemesanan sesuai data yang ada</h6>
        <form action="" method="post" class="space-y-4 ">
            <div>
                <label for="pemesanan_id" class="block text-sm font-medium text-gray-600">Pemesanan ID</label>
                <input type="text" id="pemesanan_id" name="pemesanan_id" placeholder="123" class="w-full p-2 mt-1 border rounded-md " required value="<?= $edit['pemesanan_id'] ?>" readonly>
            </div>
            <div>
                <label for="nik" class="block text-sm font-medium text-gray-600">NIK Customer</label>
                <select class="w-full p-2 mt-1 border rounded-md" name="nik">
                    <option selected value="<?= $edit['user_id'] ?>"><?= $edit['nik'] . ' - ' . $edit['nama'] ?></option>
                    <?php
                    // Lakukan koneksi ke database sebelum menggunakan $conn
                    $queryuse = "SELECT * FROM user";
                    $resultuse = $conn->query($queryuse);
                    while ($use = $resultuse->fetch_assoc()) :?>
                        <option value="<?= $use['user_id'] ?>"><?= $use['nik'] . ' - ' . $use['nama'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div>
                <label for="tanggal_pesan" class="block text-sm font-medium text-gray-600">Tanggal Pesan</label>
                <input type="text" id="tanggal_pesan" name="tanggal_pesan"  class="w-full p-2 mt-1 border rounded-md" required value="<?php echo date('d-m-Y'); ?>" readonly>
            </div>
            <div>
        <label for="tanggal_checkin" class="block text-sm font-medium text-gray-600">Tanggal Check-In Customer</label>
        <input type="date" id="tanggal_checkin" name="tanggal_checkin" placeholder="" class="w-full p-2 mt-1 border rounded-md" value="<?= date('Y-m-d', strtotime($edit['tanggal_checkin'])) ?>">
    </div>
    <div>
        <label for="tanggal_checkout" class="block text-sm font-medium text-gray-600">Tanggal Check-Out Customer</label>
        <input type="date" id="tanggal_checkout" name="tanggal_checkout" placeholder="" class="w-full p-2 mt-1 border rounded-md" value="<?= date('Y-m-d', strtotime($edit['tanggal_checkout'])) ?>">
    </div>

            <div>
                <label for="jumlah_tamu" class="block text-sm font-medium text-gray-600">Jumlah Tamu:</label>
                <input type="number" name="jumlah_tamu" id="jumlah_tamu" placeholder="2" min="1" max="2" class="w-full p-2 mt-1 border rounded-md" required value="<?= $edit['jumlah_tamu'] ?>"><br>
            </div>
            <div>
                <label for="kamar" class="block text-sm font-medium text-gray-600">Kamar</label>
                <select class="w-full p-2 mt-1 border rounded-md" name="kamar">
                    <option selected value="<?= $edit['kamar_id'] ?>"><?= $edit['nomor_kamar'] . ' - ' . $edit['slug'] ?></option>
                    <?php

                    $querykmr = "SELECT kamar.kamar_id, kamar.nomor_kamar, tipekamar.slug AS slug 
                    FROM kamar 
                    INNER JOIN tipekamar ON kamar.tipe_kamar_id = tipekamar.tipe_kamar_id";
                    $resultkmr = $conn->query($querykmr);
                    while ($kmr = $resultkmr->fetch_assoc()) :
                    ?>
                        <option value="<?= $kmr['kamar_id'] ?>"><?= $kmr['nomor_kamar'] . ' - ' .$kmr['slug'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div>
                <label for="tipe_kamar" class="block text-sm font-medium text-gray-600">Tipe Kamar</label>
                <select class="w-full p-2 mt-1 border rounded-md" name="tipe_kamar">
                    <option selected disabled value="<?= $edit['tipe_kamar_id'] ?>"><?= $edit['nama_tipe'] . ' - ' . $edit['harga'] ?></option>
                    <?php
                    $querytipe = "SELECT * FROM tipekamar";
                    $resulttipe = $conn->query($querytipe);
                    while ($tipe = $resulttipe->fetch_assoc()) :
                    ?>
                        <option value="<?= $tipe['tipe_kamar_id'] ?>"><?= $tipe['nama_tipe'] . ' - ' . $tipe['harga'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div>
                <label for="harga_kamar" class="block text-sm font-medium text-gray-600">Harga Kamar Per Malam</label>
                <input type="number" name="harga_kamar" id="harga_kamar" placeholder="2" class="w-full p-2 mt-1 border rounded-md" required value="<?= $edit['harga_kamar_per_malam'] ?>"><br>
            </div>
            
            <div>
                <label for="fasilitas_plus" class="block text-sm font-medium text-gray-600">Fasilitas Plus</label>
                <select name="fasilitas_plus" class="w-full p-2 mt-1 border rounded-md" required>
                    <option selected value="<?= $edit['fasilitas_plus'] ?>"><?= $edit['fasilitas_plus'] ?></option>
                    <option value="Sarapan">Sarapan</option>
                    <option value="tidak_sarapan">Tidak Sarapan</option>
                </select><br>
            </div>
            <div>
                <label for="status_pemesanan" class="block text-sm font-medium text-gray-600">Status Pemesanan:</label>
                <select name="status_pemesanan" class="w-full p-2 mt-1 border rounded-md" required>
                    <option selected value="<?= $edit['status_pemesanan'] ?>"><?= $edit['status_pemesanan'] ?></option>
                    <option value="dikonfirmasi">Dikonfirmasi</option>
                    <option value="batal">Batal</option>
                    <option value="selesai">Selesai</option>
                    <option value="proses">Proses</option>
                </select><br>
            </div>

            <div>
                <button type="submit" name="ubah" class="w-full p-2 text-white bg-blue-700 rounded-md hover:bg-blue-300">Simpan</button>
            </div>
        </form>
    </div>

    <p class="mt-4 text-lg text-center text-gray-600">Tidak ingin menambahkan data? <a href="../datapemesanan.php" class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>

    <?php
    }
?>

    <!-- <script>
    // Fungsi untuk mengubah format tampilan tanggal menjadi "tanggal-bulan-tahun"
    function formatDateInput(inputId) {
        var input = document.getElementById(inputId);
        var dateValue = input.value; // Nilai tanggal dalam format ISO (YYYY-MM-DD)
        var date = new Date(dateValue); // Buat objek Date dari nilai tanggal
        
        // Buat string dengan format "DD-MM-YYYY"
        var formattedDate = ('0' + date.getDate()).slice(-2) + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + date.getFullYear();
        
        // Set nilai input dengan format tanggal baru
        input.value = formattedDate;
    }

    // Panggil fungsi formatDateInput saat halaman dimuat
    window.onload = function() {
        formatDateInput('tanggal_checkin');
        formatDateInput('tanggal_checkout');
    };
</script> -->
</body>

</html>