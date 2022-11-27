<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $query = "SELECT * FROM users where email = '$email'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
}
?>