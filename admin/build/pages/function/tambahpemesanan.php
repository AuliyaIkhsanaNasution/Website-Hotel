<?php
require "koneksi.php";

// memanggil apabila tombol submit di klik
if (isset($_POST["submit"])) {
    $pemesanan_id = htmlspecialchars($_POST["pemesanan_id"]);
    $nik = htmlspecialchars($_POST["nik"]);
    $tanggal_pesan = date('Y-m-d');
    $tanggal_checkin = htmlspecialchars($_POST["tanggal_checkin"]);
    $tanggal_checkout = htmlspecialchars($_POST["tanggal_checkout"]);
    $jumlah_tamu = htmlspecialchars($_POST["jumlah_tamu"]);
    $status_pemesanan = htmlspecialchars($_POST["status_pemesanan"]);
    $kamar = htmlspecialchars($_POST["kamar"]);
    $tipe_kamar = htmlspecialchars($_POST["tipe_kamar"]);
    $harga_kamar = htmlspecialchars($_POST["harga_kamar"]);
    $fasilitas_plus = htmlspecialchars($_POST["fasilitas_plus"]);

    // Hitung selisih hari antara tanggal check-in dan check-out
    $tanggal_checkin_unix = strtotime($tanggal_checkin);
    $tanggal_checkout_unix = strtotime($tanggal_checkout);
    $selisih_hari = ($tanggal_checkout_unix - $tanggal_checkin_unix) / (60 * 60 * 24);

    // Hitung total harga berdasarkan harga kamar per malam dan jumlah malam menginap
    $total_harga = $harga_kamar * $selisih_hari;

    // Jika fasilitas_plus adalah 'sarapan', tambahkan biaya tambahan sebesar 100.000
    if ($fasilitas_plus == 'sarapan') {
        $total_harga += 100000; // Biaya tambahan untuk sarapan
    }

    // Lakukan query SQL untuk memasukkan data ke dalam tabel pemesanan
    $query_pemesanan = "INSERT INTO pemesanan (pemesanan_id, user_id, tanggal_pesan, tanggal_checkin, tanggal_checkout, jumlah_tamu, total_harga, status_pemesanan) VALUES ('$pemesanan_id', '$nik', '$tanggal_pesan', '$tanggal_checkin', '$tanggal_checkout', '$jumlah_tamu', '$total_harga', '$status_pemesanan')";


    // Ambil pemesanan_id yang baru saja dimasukkan
    $pemesanan_id = mysqli_insert_id($koneksi);

    // / Lakukan query SQL untuk memasukkan data ke dalam tabel detail pemesanan
    $query_detail_pemesanan = "INSERT INTO detailpemesanan (pemesanan_id, kamar_id, tipe_kamar, harga_kamar_per_malam, fasilitas_plus) VALUES ('$pemesanan_id', '$kamar', '$tipe_kamar', '$harga_kamar', '$fasilitas_plus')";


    if ($conn->query($query_detail_pemesanan) === TRUE) {
        header("location: ../datapemesanan.php?tambah=true");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
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
    <title>Form Tambah Data Pemesanan</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="p-6 bg-blue-200">
    <div class="max-w-xl p-8 mx-auto bg-yellow-100 rounded shadow-md outline outline-2 outline-offset-2 outline-yellow-500">
        <h2 class="mb-3 text-2xl font-bold text-center text-slate-600 ">Tambah Data Pemesanan</h2>
        <h6 class="mb-5 text-sm text-slate-500 ">*harap isi Data Pemesanan sesuai data yang ada</h6>
        <form action="" method="post" class="space-y-4 ">
            <div>
                <label for="pemesanan_id" class="block text-sm font-medium text-gray-600">Pemesanan ID</label>
                <input type="text" id="pemesanan_id" name="pemesanan_id" placeholder="123" class="w-full p-2 mt-1 border rounded-md " required>
            </div>
            <div>
                <label for="nik" class="block text-sm font-medium text-gray-600">NIK Customer</label>
                <select class="w-full p-2 mt-1 border rounded-md" name="nik">
                    <option selected>--Pilih Customer--</option>
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
                <input type="text" id="tanggal_pesan" name="tanggal_pesan"  class="w-full p-2 mt-1 border rounded-md" required value="<?php echo date('d-m-Y'); ?>">
            </div>
            <div>
                <label for="tanggal_checkin" class="block text-sm font-medium text-gray-600">Tanggal Check-In Customer</label>
                <input type="date" id="tanggal_checkin" name="tanggal_checkin" placeholder="" class="w-full p-2 mt-1 border rounded-md">
            </div>
            <div>
                <label for="tanggal_checkout" class="block text-sm font-medium text-gray-600">Tanggal Check-Out Customer</label>
                <input type="date" id="tanggal_checkout" name="tanggal_checkout" placeholder="" class="w-full p-2 mt-1 border rounded-md">
            </div>
            <div>
                <label for="jumlah_tamu" class="block text-sm font-medium text-gray-600">Jumlah Tamu:</label>
                <input type="number" name="jumlah_tamu" id="jumlah_tamu" placeholder="2" min="1" max="2" class="w-full p-2 mt-1 border rounded-md" required><br>
            </div>
            <div>
                <label for="kamar" class="block text-sm font-medium text-gray-600">Kamar</label>
                <select class="w-full p-2 mt-1 border rounded-md" name="kamar">
                    <option selected>--Pilih kamar--</option>
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
                    <option selected>--Pilih Tipe Kamar--</option>
                    <?php

                    $querytipe = "SELECT * FROM tipekamar";
                    $resulttipe = $conn->query($querytipe);
                    while ($tipe = $resulttipe->fetch_assoc()) :
                    ?>
                        <option value="<?= $tipe['tipe_kamar_id'] ?>"><?= $tipe['nama_tipe']. ' - ' .$tipe['harga'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div>
                <label for="harga_kamar" class="block text-sm font-medium text-gray-600">Harga Kamar Per Malam</label>
                <input type="number" name="harga_kamar" id="harga_kamar" placeholder="2" class="w-full p-2 mt-1 border rounded-md" required><br>
            </div>
            
            <div>
                <label for="fasilitas_plus" class="block text-sm font-medium text-gray-600">Fasilitas Plus</label>
                <select name="fasilitas_plus" class="w-full p-2 mt-1 border rounded-md" required>
                    <option value="sarapan">Sarapan</option>
                    <option value="tidak_sarapan">Tidak Sarapan</option>
                </select><br>
            </div>
            <div>
                <label for="status_pemesanan" class="block text-sm font-medium text-gray-600">Status Pemesanan:</label>
                <select name="status_pemesanan" class="w-full p-2 mt-1 border rounded-md" required>
                    <option value="dikonfirmasi">Dikonfirmasi</option>
                    <option value="batal">Batal</option>
                    <option value="selesai">Selesai</option>
                    <option value="proses">Proses</option>
                </select><br>
            </div>

            <div>
                <button type="submit" name="submit" class="w-full p-2 text-white bg-blue-700 rounded-md hover:bg-blue-300">Simpan</button>
            </div>
        </form>
    </div>

    <p class="mt-4 text-lg text-center text-gray-600">Tidak ingin menambahkan data? <a href="../datapemesanan.php" class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>


    <script>
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
</script>
</body>

</html>