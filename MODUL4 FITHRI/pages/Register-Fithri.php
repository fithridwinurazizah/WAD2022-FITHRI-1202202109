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
        <title>Register</title>
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
              <h1>Register</h1>
              <form action="" method="post" class="mb-3" autocomplete='off'>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Email"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nama"
                    name="nama"
                    placeholder="Nama"
                  />
                </div>
                <div class="mb-3">
                  <label for="no" class="form-label">Nomor Handphone</label>
                  <input
                    type="text"
                    class="form-control"
                    id="no"
                    name="no"
                    placeholder="088xxxxxxxx"
                    required
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
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="password2" class="form-label"
                    >Konfirmasi Password</label
                  >
                  <input
                    type="password"
                    class="form-control"
                    id="password2"
                    name="password2"
                    placeholder="Konfirmasi Password"
                    required
                  />
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
                        include '../config/register.php';
                        Header('Location: ./Login-Fithri.php');
                      }
                    }?>
                </div>
                <button type="submit" class="btn btn-primary mt-3 login">
                  Register
                </button>
              </form>
              <p>Anda Sudah Punya Akun? <a href="./Login-Fithri.php">Login</a></p>
            </div>
          </div>
        </div>
      </body>
    </html>
