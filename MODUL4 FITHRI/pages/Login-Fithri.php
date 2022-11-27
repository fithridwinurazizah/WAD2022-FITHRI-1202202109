<?php
require '../config/connector.php';
include '../config/login.php';
?>

<!DOCTYPE html><html lang="en">
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
    <title>Login</title>
  </head>
  <body>
    <div class="row">
      <div class="col">
        <img
          src="https://img-ik.cars.co.za/news-site-za/images/2022/11/vw-t-cross-detail.jpg"
          alt=""
          id="bg"
        />
      </div>
      <div class="col d-flex justify-conten-center align-items-center">
        <div class="container p-3">
          <h1>Login</h1>
          <form action="" method="post" class="mb-3">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Email"
                value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email']; }?>"
              />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="Password"
                value="<?php  if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; } ?>"
              />
            </div>
            <div class="mb-3">
              <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE['remember'])){ echo $_COOKIE['remember']; } ?>/>
              <label class="form-check-label" for="remember">
                Remember me
              </label>
              <?php
              if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['remember']) && $_POST['remember'] == 'on'){
                  setcookie('email', $_POST['email'], time()+60*60*24*30);
                  setcookie('password', $_POST['password'], time()+60*60*24*30);
                  setcookie('remember', 'checked', time()+60*60*24*30);
                }else{
                  setcookie('email', '', time()-60*60*24*30);
                  setcookie('password', '', time()-60*60*24*30);
                  setcookie('remember', '', time()-60*60*24*30);
                }
              ?>
            <?php
                  if ($_POST['password'] != $row['password']) {
                    ?>
                    <div class="alert alert-danger text-center mt-3">
                      Password tidak sama
                    </div>
                    <?php      
                  } else {
                    session_start();
                    $_SESSION['login'] = true;
                    $_SESSION['email'] = $row['email'];
                    Header('Location: ./ListCar-Fithri.php');
                  }
                }?>
              </div>
            <button type="submit" class="btn btn-primary login">Login</button>
          </form>
          <p>Anda Belum Punya Akun? <a href="./Register-Fithri.php">Daftar</a></p>
        </div>
      </div>
    </div>
  </body>
</html>
