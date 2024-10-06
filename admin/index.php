
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SerbaAda</title>
    <link rel="stylesheet" href="assets/login.css" />
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="proses_login_petugas.php" autocomplete="off" class="sign-in-form" method="post">
              <div class="logo">
                <img src="assets/img/serba.png" alt="" />
                <h4>erbaAda</h4>
              </div>

              <div class="heading">
                <h2>Petugas</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="2"
                    name="username"
                    id="username"
                    class="input-field"
                    autocomplete="off"
                    required
                    />
                    <label>Name</label>
                  </div>
                  
                  <div class="input-wrap">
                    <input
                    type="password"
                    minlength="2"
                    name="password"
                    id="password"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                </div>

                <input type="submit" value="Sign In" class="sign-btn" />

                <p class="text">
                  Forgotten your password or you login datails?
                  <a href="help.php">Get help</a> signing in
                </p>
              </div>
            </form>

            <form action="index.html" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="assets/img/serba.png" alt="easyclass" />
                <h4>erbAda</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>
              
              <input type="button" value="Sign Up" class="sign-btn" onclick="window.location.href='tambah_petugas.php';" />
              <input type="button" value="Login Pelanggan" class="sign-btn" onclick="window.location.href='../index.php';" />
                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="assets/img/imageP1.png" class="image img-1 show" alt="" />
              <img src="assets/img/imageP2.png" class="image img-2" alt="" />
              <img src="assets/img/image3.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Belanja Mudah dan Cepat</h2>
                  <h2>Kurir Handal, Barang  Aman</h2>
                  <h2>Temukan Produk Pilihan Anda</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>
