<?php
if(isset($_POST)){
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $no = $_POST['no'];
    $password = $_POST['password'];
    $query = "INSERT INTO users (nama, email, password, no_hp) VALUES ('$nama', '$email', '$password', '$no')";
    $result = mysqli_query($koneksi, $query);
}
?>