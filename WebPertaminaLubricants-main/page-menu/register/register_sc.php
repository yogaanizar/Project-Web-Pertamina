<?php
        include '../database/koneksi.php';
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $jenis_kelamin = $_POST['jenis_kelamin'];

        $insert = mysqli_query($conn,"INSERT INTO user(nama,username,password,jenis_kelamin) VALUES ('$nama', '$username', '$password', '$jenis_kelamin')");
        if($insert){
          echo '<script type ="text/JavaScript">';  
          echo 'alert("Registrasi Berhasil")';  
          echo '</script>';
          echo '<meta http-equiv="refresh" content="0.1;url=../login/login.php">';
        }else{
            echo '<center>Registrasi Gagal ! Username Telah Tersedia</center>';
        }
        
?>

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
  <body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card mb-4 mx-4">
              <div class="card-body p-4">
                <h1 class="text-primary"><center>Register</center></h1><hr>
                <p class="text-medium-emphasis">*Silahkan registrasi akun untuk masuk kedalam aplikasi</p>
                <form action="register_sc.php" method="post">
                  <p>Nama :</p>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa-solid fa-font">
                        </div>
                      </div>
                  </div>
                  <p>Jenis Kelamin :</p>
                  <div class="input-group mb-3">
                      <select type="varchar" class="custom-select rounded-0" name="jenis_kelamin">
                        <option class="bg-secondary" value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa-solid fa-venus">
                        </div>
                      </div>
                  </div>
                  <p>Username :</p>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Username" name="username">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                  </div>
                  <p>Password :</p>
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                  </div>
                  <div>
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </a>
                  </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>