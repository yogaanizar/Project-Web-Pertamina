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
                <form id="quickForm" action="register_sc.php" method="post">
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
              <div class="mt-2 ml-4">Sudah Punya Akun? <a href="../login/login.php"><u><b>Login Disini</b></u></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      nama: {
        required: true,
      },
      jenis_kelamin: {
        required: true,
      },
      username: {
        required: true,
      },
      password: {
        required: true,
      },
    },
    messages: {
      nama: {
        required: "Nama Tidak Boleh Kosong",
      },
      jenis_kelamin: {
        required: "Jenis Kelamin Tidak Boleh Kosong",
      },
      username: {
        required: "Username Tidak Boleh Kosong",
      },
      password: {
        required: "Password Tidak Boleh Kosong",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>