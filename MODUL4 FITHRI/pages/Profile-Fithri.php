<?php
require '../config/connector.php';
session_start();
if($_SESSION['login'] != 1){
  header('Location: ../index.php');
}

if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
  $query = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_assoc($result);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if($_POST['navbar'] == 1){
    setrawcookie('navbar', 'bg-danger', time() + 3600, '../../../');
  } elseif ($_POST['navbar'] == 2){
    setrawcookie('navbar', 'bg-primary', time() + 3600, '../../../');
  }
  elseif ($_POST['navbar'] == 3){
    setrawcookie('navbar', 'bg-success', time() + 3600, '../../../');
  }
}

if(!isset($_COOKIE['navbar'])){
  $navbar = 'bg-primary';
}else{
  $navbar = $_COOKIE['navbar'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../asset/style/styles.css" />
    <title>Profile</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg <?= $navbar?> navbar-dark">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./ListCar-Fithri.php">My Cars</a>
            </li>
          </ul>
        </div>
        <a class="btn btn-light" href='Add-Fithri.php'>Add Car</a>
        <?php
        if(isset($row)){ ?>
        <div class="dropdown ms-3">
          <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $row['nama'] ?>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./Profile-Fithri.php">Profile</a></li>
            <li><a class="dropdown-item" href="../config/logout.php">Log Out</a></li>
          </ul>
        </div>
        <?php
        }?>
      </div>
    </nav>
    <main>
      <div class="container  p-3">
        <h1 class="text-center">Profile</h1>
        <form method="post">
        <table style='width: 100%;'>
          <tbody>
            <tr>
              <td><label for="email" class="form-label">Email</label></td>
              <td><input type="text" name="email" id="email" class="form-control border border-0" value='<?= $row['email'] ?>' readonly></td>
            </tr>
            <tr>
              <td><label for="nama" class="form-label">Nama</label></td>
              <td><input type="text" name="nama" id="nama" class="form-control rounded-3 border border-dark" placeholder="<?= $row['nama'] ?>"></td>
            </tr>
            <tr>
              <td><label for="no" class="form-label">Nomor Handphone</label></td>
              <td><input type="text" name="no" id="no" class="form-control rounded-3 border border-dark" placeholder="<?= $row['no_hp'] ?>"></td>
            </tr>
          </tbody>
        </table>
        <hr>
        <table style='width: 100%'>
        <tbody>
          <tr>
            <td><label for="password" class="form-label">Kata Sandi</label></td>
            <td><input type="password" name="password" id="password" class="form-control rounded-3 border border-dark" placeholder="Kata Sandi" required></td>
          </tr>
          <tr>
            <td><label for="password2" class="form-label">Konfirmasi Kata Sandi</label></td>
            <td><input type="password" name="password2" id="password2" class="form-control rounded-3 border border-dark" placeholder="Konfirmasi Kata Sandi" required></td>
          </tr>
          <tr>
            <td><label for="navbar" class="form-label">Warna Navbar</label></td>
            <td>
              <select class="form-select l rounded-3 border border-dark" aria-label="Default select example" name="navbar">
                <option selected>Open this select menu</option>
                <option value="1">Red</option>
                <option value="2">Blue</option>
                <option value="3">Green</option>
              </select>
            </td>
          </tr>
        </tbody>
        </table>
        <?php
          if (isset($_POST['password']) && isset($_POST['password2'])) {
            if ($_POST['password'] != $_POST['password2']) {
              ?>
              <div class="alert alert-danger text-center mt-3">
                Password tidak sama
              </div>
        <?php      
            } else {
              require '../config/connector.php';
              require '../config/edit.php';
            }
          }?>
        <div class="d-grid gap-2 d-md-flex justify-content-center">
          <button class="btn btn-primary me-md-2 px-5 mt-3" type="submit" name="profile">Update</button>
      </div>
      </form>
    </main>
    <footer class="position-absolute bottom-0 mb-5 ms-5 d-flex align-items-center">
      <img src="../asset/images/logo-ead.png" alt="" width="200">
      <p class="ms-5">Fithri_1202202109</p>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
