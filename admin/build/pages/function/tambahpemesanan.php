<?php
require "koneksi.php"; // Mengimport file koneksi.php
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
        <form action="pemesananProses/prosesSimpanPemesanan.php" method="post" class="space-y-4 ">
            <div>
                <label for="nik" class="block text-sm font-medium text-gray-600">NIK Customer</label>
                <select class="w-full p-2 mt-1 border rounded-md" name="nik">
                    <option selected>--Pilih Customer--</option>
                    <?php
                    // Lakukan koneksi ke database sebelum menggunakan $conn
                    $queryuse = "SELECT * FROM user";
                    $resultuse = $conn->query($queryuse);
                    while ($use = $resultuse->fetch_assoc()) : ?>
                        <option value="<?= $use['user_id'] ?>"><?= $use['nik'] . ' - ' . $use['nama'] ?></option>
                    <?php endwhile; ?>
                </select>
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
                <label for="tipe_kamar" class="block text-sm font-medium text-gray-600">Tipe Kamar</label>
                <select id="tipekamar" class="w-full p-2 mt-1 border rounded-md" name="tipe_kamar">
                    <option selected disabled>--Pilih Tipe Kamar--</option>
                    <?php
                    $querytipe = "SELECT * FROM tipekamar";
                    $resulttipe = $conn->query($querytipe);
                    while ($tipe = $resulttipe->fetch_assoc()) :
                    ?>
                        <option value="<?= $tipe['tipe_kamar_id'] ?>"><?= $tipe['nama_tipe'] . ' - ' . $tipe['harga'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div><label for="nomor_kamar" class="block text-sm font-medium text-gray-600">Nomor Kamar</label></div>
            <div>
                <select id="showdata" class="w-full p-2 mt-1 border rounded-md" name="nomor_kamar">
                    <!-- Options will be added here by JavaScript -->
                </select>
            </div>


            <div>
                <label for="harga_kamar" class="block text-sm font-medium text-gray-600">Harga Kamar Per Malam</label>
                <input type="number" name="harga_kamar" id="harga_kamar" placeholder="xxxxxx" class="w-full p-2 mt-1 border rounded-md" readonly><br>
            </div>

            <div>
                <label for="fasilitas_plus" class="block text-sm font-medium text-gray-600">Fasilitas Plus</label>
                <select name="fasilitas_plus" class="w-full p-2 mt-1 border rounded-md" required>
                    <option selected>--Pilih Fasilitas Plus--</option>
                    <option value="sarapan">Sarapan</option>
                    <option value="tidak_sarapan">Tidak Sarapan</option>
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#tipekamar").change(function() {
                var tipekamarId = $(this).val();
                var checkin = $('#tanggal_checkin').val();

                if (tipekamarId != "") {
                    $.ajax({
                        type: "get",
                        url: "ambilkamar.php",
                        data: {
                            tipekamarId: tipekamarId,
                            checkin: checkin
                        },
                        cache: false,
                        success: function(response) {
                            var data = JSON.parse(response);
                            $('#showdata').html(data.html); // Tampilkan opsi kamar
                            $('#harga_kamar').val(data.harga);
                            console.log(data);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr);
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>