    <?php
    if(isset($_SESSION['email'])){
      require './config/connector.php';
      $email = $_SESSION['email'];
      $query = "SELECT * FROM users WHERE email = '$email'";
      $result = mysqli_query($koneksi, $query);
      $row = mysqli_fetch_assoc($result);
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
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Home</title>
        <link
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous"
        />
        <link rel="stylesheet" href="asset/style/styles.css" />
      </head>
      <body>
        <nav class="navbar navbar-expand-lg <?= $navbar ?> navbar-dark">
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
                  <a class="nav-link active" aria-current="page" href="../index.php"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./pages/ListCar-Fithri.php">My Cars</a>
                </li>
              </ul>
            </div>
            <?php
            if(!isset($_SESSION['login'])){
              ?>
                <a class='btn btn-light' href='pages/Login-Fithri.php'>
                Login
              </a>
              <?php
              }else{ 
                if(isset($row)){ ?>
            <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $row['nama'] ?>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Log Out</a></li>
              </ul>
            </div>
            <?php
            }}?>
          </div>
        </nav>
        <main class="main">
          <div class="container">
            <div class="row mt-5">
              <div class="col d-flex justify-content-center align-items-center">
                <div class="container">
                  <h1>Selamat Datang di Show Room Fithri</h1>
                  <p class="text-secondary">
                    At lacus vitae nulla sagittis scelerisque nisl. Pellentesque
                    duis cursus vestibulum, facilisi ac, sed faucibus.
                  </p>
                  <a href="pages/ListCar-Fithri.php" class="btn btn-primary"
                    >My Cars</a
                  >
                  <div class="d-flex mt-5">
                    <img src="../asset/images/logo-ead.png" alt="" width="100"/>
                    <p class="ms-5">Fithri_1202202109</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <img
                  src="https://www.mercedes-benz.co.id/passengercars/mercedes-benz-cars/models/gle/coupe-c167/explore/highlights/_jcr_content/contentgallerycontainer/par/contentgallery/par/contentgallerytile_58586423/image.MQ6.8.20200922100836.jpeg"
                  alt="" width="550"
                  class="img-fluid"
                />
              </div>
            </div>
          </div>
        </main>
        <script
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
          crossorigin="anonymous"
        ></script>
      </body>
    </html>
