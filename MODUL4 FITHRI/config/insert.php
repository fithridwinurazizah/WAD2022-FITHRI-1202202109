<?php

require 'connector.php';


$nama_mobil = $_POST['nama_mobil'];
$nama_pemilik = $_POST['nama_pemilik'];
$merk = $_POST['merk'];
$tanggal = $_POST['tanggal'];
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];
$gambar = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
move_uploaded_file($tmp,'../asset/images/'.$gambar);

$query = "INSERT INTO tabel_mobil (nama_mobil, pemilik_mobil, merk_mobil, tanggal_beli, deskripsi, foto_mobil, status_pembayaran) VALUES ('$nama_mobil', '$nama_pemilik', '$merk', '$tanggal', '$deskripsi', '$gambar', '$status[0]')";
$result = mysqli_query($koneksi, $query);

Header("Location: ../pages/ListCar-Fithri.php");
?>