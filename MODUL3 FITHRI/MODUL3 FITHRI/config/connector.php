<?php
$user = "root";
$pass = "";
$host = "localhost";
$db = "showroom_tabel_mobil";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>