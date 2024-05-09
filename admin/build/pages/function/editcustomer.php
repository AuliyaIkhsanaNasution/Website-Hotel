<?php
require "koneksi.php";

$user_id = $_GET["id"];

// query data user berdasarka id
$sql = "SELECT * FROM user WHERE user_id = '$user_id'";
$hasil = $conn->query($sql);


// memanggil apabila tombol submit di klik
if (isset($_POST["ubah"])) {
    $user_id = htmlspecialchars($_POST["user_id"]);
    $email = htmlspecialchars($_POST["email"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $no_telepon = htmlspecialchars($_POST["no_telepon"]);


    $query = "UPDATE user SET
        email = '$email',
        nama = '$nama',   
        alamat = '$alamat',
        no_telepon = '$no_telepon'
    WHERE user_id = '$user_id'";

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
    <title>Form Edit Data Pelanggan</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="bg-blue-200 p-6">



        <?php while ($cst = $hasil->fetch_assoc()) { ?> 

        <div class="max-w-xl mx-auto  rounded p-8 shadow-md outline outline-2  outline-offset-2 outline-yellow-500 bg-yellow-100">
            <h2 class="text-2xl font-bold mb-8 text-slate-600 text-center ">Edit Data Customer</h2>
            <form action="" method="post" class="space-y-4 ">

                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-600">No KTP Customer</label>
                    <input type="text" id="user_id" name="user_id" class="mt-1 p-2 w-full border rounded-md "  value="<?php echo $cst['user_id']; ?>" readonly>
                </div>
               
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email Customer</label>
                <input type="text" id="email" name="email" 
                    class="mt-1 p-2 w-full border rounded-md" value="<?php echo $cst['email']; ?>" required>
            </div>
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama Customer</label>
                <input type="text" id="nama" name="nama" class="mt-1 p-2 w-full border rounded-md" value="<?php echo $cst['nama']; ?>"
                    required>
            </div>
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat Customer</label>
                <input type="text" id="alamat_customer" name="alamat" class="mt-1 p-2 w-full border rounded-md" value="<?php echo $cst['alamat']; ?>"
                    required>
            </div>
            <div>
                <label for="no_telepon" class="block text-sm font-medium text-gray-600">No Telephone</label>
                <input type="text" id="no_teleponr" name="no_telepon" class="mt-1 p-2 w-full border rounded-md" value="<?php echo $cst['no_telepon']; ?>" required>
            </div>
                <div>
                    <button type="submit" name="ubah" class="w-full bg-blue-700 text-white p-2 rounded-md hover:bg-blue-300">Simpan</button>
                </div>
            </form>
        </div>

        <p class="mt-4 text-lg text-gray-600 text-center">Tidak ingin menambahkan data? <a href="../datapelanggan.php" class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>
</body>

<?php
    }
?>

</html>