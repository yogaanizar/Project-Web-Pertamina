<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
      <?php
        include '../navbar/header.php'
      ?>  
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
          <img src="../../dist/img/pertaminafix.png" width="350" height="250">
      </div>
      <!-- awal login bar -->
      <center>
      <div class="login-box">
        <div class="login-logo">
          <a href="#"><b>PT.Pertamina Lubricants</a>
        </div>
        <div class="login-box">
          <div class="login-logo">
            <a href="#"><b>Inventaris Aset</b></a>
          </div>
          <div class="card">
            <div class="card-body login-card-body">
              <p class="text-primary"><center><h3 class="text-primary"><b>Login</b></h3></center></p><hr>
              <form action="login_sc.php" method="post">
                <div class="input-group mb-3 mt-3">
                  <input type="text" class="form-control" placeholder="Masukkan Username" name="username">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                </div>
                <div class="input-group mb-5">
                  <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                </div>
                <!-- <p>Belum Punya Akun?<a href="../register/register.php"><u> Register Disini</u> </a></p> -->
                <div>
                    <button type="submit" class="btn btn-primary btn-block"> Sign In</button>
                  </a>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>  
      </center>
        <!-- akhir login bar -->
      </div>
    </div>
  </body>
</html>