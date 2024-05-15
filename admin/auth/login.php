<?php
require "../build/pages/function/koneksi.php";
session_start();


if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM pegawai WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();


    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['level'] = $row['posisi_id'];
        $_SESSION['user'] = $username;
        $_SESSION['login'] = true;

        // echo $_SESSION['level'];

        header("Location: ../build/pages/dashboard.php");
    } else {
        header("Location: ../index.php?login=false");
    }
}
