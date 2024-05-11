<?php
require "koneksi.php";

$tipe_kamar_id = $_GET["id"];

// query data tipe_kamar berdasarka id
$sql = "SELECT * FROM tipekamar WHERE tipe_kamar_id = '$tipe_kamar_id'";
$hasil = $conn->query($sql);


// memanggil apabila tombol submit di klik
if (isset($_POST["submit"])) {
    $slug = htmlspecialchars($_POST["slug"]);
    $nama_tipe = htmlspecialchars($_POST["nama_tipe"]);
    $jmlh_tamu = htmlspecialchars($_POST["jmlh_tamu"]);
    $ukuran = htmlspecialchars($_POST["ukuran"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);


    $query = "UPDATE tipe_kamar SET
        nik = '$nik',
        email = '$email',
        nama = '$nama',   
        alamat = '$alamat',
        no_telepon = '$no_telepon'
    WHERE tipe_kamar_id = '$user_id'";

    if (mysqli_query($conn, $query) === TRUE) {
        header("location: ../datacustomer.php?ubah=true");
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
    <link rel="icon" type="image/png" href="../../assets/img/logo.jpeg" />
    <title>Form Tambah Data Tipe Kamar</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="p-6 bg-blue-200">

<?php while ($tipe = $hasil->fetch_assoc()) { ?> 

    <div class="max-w-xl p-8 mx-auto bg-yellow-100 rounded shadow-md outline outline-2 outline-offset-2 outline-yellow-500">
        <h2 class="mb-3 text-2xl font-bold text-center text-slate-600 ">Tambah Data Tipe Kamar</h2>
        <h6 class="mb-5 text-sm text-slate-500 ">*harap isi data Tipe Kamar sesuai data yang ada</h6>

        <form action="" method="post" enctype="multipart/form-data" class="space-y-4 ">

        <input type="hidden" name="tipe_kamar_id" value="<?= $tipe['tipe_kamar_id'] ?>">
        <input type="hidden" name="gambar_lama" value="<?= $tipe['image'] ?>">
         <div>
                <label for="slug" class="block text-sm font-medium text-gray-600">Tipe</label>
                <input type="text" id="slug" name="slug" placeholder="Deluxe" class="w-full p-2 mt-1 border rounded-md " required value="<?php echo $tipe['slug']; ?>">
            </div>
            <div>
                <label for="nama_tipe" class="block text-sm font-medium text-gray-600">Nama Tipe Kamar</label>
                <input type="text" id="nama_tipe" name="nama_tipe" placeholder="Deluxe-Twin Bed" class="w-full p-2 mt-1 border rounded-md " required value="<?php echo $tipe['nama_tipe']; ?>">
            </div>
            <div>
                <label for="jmlh_tamu" class="block text-sm font-medium text-gray-600">Jumlah Tamu/Kamar</label>
                <input type="number" id="jmlh_tamu" name="jmlh_tamu" placeholder="2" class="w-full p-2 mt-1 border rounded-md " required value="<?php echo $tipe['jmlh_tamu']; ?>">
            </div>
            <div>
                <label for="ukuran" class="block text-sm font-medium text-gray-600">Ukuran Kamar</label>
                <input type="number" id="ukuran" name="ukuran" placeholder="27" class="w-full p-2 mt-1 border rounded-md " required value="<?php echo $tipe['ukuran']; ?>">
            </div>
            <div>
                <label for="harga" class="block text-sm font-medium text-gray-600">Harga Kamar/Permalam</label>
                <input type="number" id="harga" name="harga" placeholder="700000" class="w-full p-2 mt-1 border rounded-md " required value="<?php echo $tipe['harga']; ?>">
            </div>
            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-600">Deskripsi Kamar (gambar harus .jpeg)</label>
                <input type="text" id="deskripsi" name="deskripsi" placeholder="700000" class="w-full p-2 mt-1 border rounded-md " required value="<?php echo $tipe['deskripsi']; ?>">
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-600">Image Kamar</label>
                <img class="w-full rounded-md" style="max-width: 200px;" src="../../assets/img/<?= $tipe['image'] ?>.jpeg" alt="" />
                <input type="file" id="image" name="image" placeholder="" class="w-full p-2 mt-1 border rounded-md " required>
            </div>
            
            <div>
                <button type="submit" name="submit" class="w-full p-2 text-white bg-blue-700 rounded-md hover:bg-blue-300">Simpan</button>
            </div>
        </form>
    </div>

    <p class="mt-4 text-lg text-center text-gray-600">Tidak ingin menambahkan data? <a href="../datacustomer.php" class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>

    
    <?php
    }
?>
</body>

</html>