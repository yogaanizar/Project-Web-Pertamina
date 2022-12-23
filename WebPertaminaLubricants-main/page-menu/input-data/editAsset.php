<?php 
	session_start();
    if($_SESSION['status']!="login"){
      header("location:../login/login.php?pesan=belum_login");
    }
  include '../database/koneksi.php';
  include '../navbar/navbar.php';
?>

<html>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-1">Edit Asset</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../inventaris/inventaris.php">Rekapitulasi Inventaris</a></li>
              <li class="breadcrumb-item active">Edit Asset</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <?php
      if(isset($_GET['kode_asset'])){
        $kode_asset = $_GET['kode_asset'];
      }else{
          die("Error! Asset tidak ditemukan");
      }
      if(isset($_GET['btn'])){
        $btn = $_GET['btn'];
      }else{
        die("Tombol tidak Ditemukan");
      }

      $query = mysqli_query($conn, "SELECT * FROM asset WHERE kode_asset = '$kode_asset'");
      $data = mysqli_fetch_array($query);
    ?>
    <div class="card card-primary ml-4 mr-4">
      <div class="card-header">
        <i class="fa-solid fa-pen-to-square fa-lg"></i><b> Form Edit Asset</b> 
      </div>
      <div class="card-body">
        <form id="quickForm" method="post" action= "setEdit.php" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label>Jenis Asset</label>
                  <select type="varchar" class="custom-select rounded-0" name="id_jenis_asset">
                    <?php
                        $query = mysqli_query($conn, "SELECT * FROM asset_inventaris WHERE kode_asset = '$kode_asset'");
                        $hasil = mysqli_fetch_array($query);
                    ?>
                    <option value="<?php echo $hasil['id_jenis_asset'] ?>" selected='selected'><?php echo $hasil['jenis_asset']?></option>
                      <?php
                        $sql = "SELECT * FROM jenis_asset";
                        $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                              if($row['id_jenis_asset'] != $hasil['id_jenis_asset']){
                                echo "<option value= $row[id_jenis_asset]>$row[jenis_asset]</option>";
                              }
                            }
                          }
                      ?>
                  </select> 
              </div>
              <div class="form-group">
                <label>Deskripsi Asset</label>
                  <input type="varchar" class="form-control" rows=3 name="deskripsi_asset" value="<?php echo $data["deskripsi_asset"] ?>"></input>
              </div>
              <div class="form-group">
                <label>Kode Asset</label>
                  <input type="varchar" class="form-control" name="kode_asset" value="<?php echo $data["kode_asset"] ?>" >
              </div>
              <div class="form-group">
                <label>Merk/ Type</label>
                  <input type="varchar" class="form-control" name="merk_type" value="<?php echo $data["merk_type"] ?>">
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                  <input type="int" class="form-control" name="jumlah" value="<?php echo $data["jumlah"] ?>">
              </div>
              <div class="form-group">
                <label>Ukuran</label>
                  <input type="varchar" class="form-control" name="ukuran" value="<?php echo $data["ukuran"] ?>">
              </div>
              <div class="form-group">
                <label>Tahun Pengadaan</label>
                  <input type="input" class="form-control" name="tahun_pengadaan" value="<?php echo $data["tahun_pengadaan"] ?>">
              </div> 
              <div class="form-group">
                <label>Status Kepemilikan Asset</label>
                  <select type="varchar" class="custom-select rounded-0" name="id_status_kepemilikan">
                  <option value="<?php echo $hasil['id_status_kepemilikan'] ?>" selected='selected'><?php echo $hasil['status_kepemilikan']?></option>
                  <?php
                      $sql = "SELECT * FROM status_kepemilikan";
                      $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            if($row['id_status_kepemilikan'] != $hasil['id_status_kepemilikan']){
                              echo"<option value=$row[id_status_kepemilikan]>$row[deskripsi_status_kepemilikan]</option>";
                            }
                          }
                        }
                    ?>
                  </select>
              </div>         
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Pemeliharaan</label>
                  <input type="input" class="form-control" name="pemeliharaan" value="<?php echo $data["pemeliharaan"] ?>">
              </div> 
              <div class="form-group">
                <label>Tanggal Pemeliharaan</label>
                  <input type="date" class="form-control" name="tanggal_pemeliharaan" value="<?php echo $data["tanggal_pemeliharaan"] ?>">
              </div> 
              <div class="form-group">
                <label for="exampleInputEmail1">Lokasi</label>
                  <select type="varchar" class="custom-select rounded-0" name="id_lokasi">
                  <option value="<?php echo $hasil['id_lokasi'] ?>" selected='selected'><?php echo $hasil['lokasi']?></option>
                  <optgroup label="Office Center">
                    <?php
                      $sql = "SELECT * FROM lokasi WHERE id_kantor= 'OC'";
                      $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            if($row['id_lokasi'] != $hasil['id_lokasi']){
                              echo "<option value=$row[id_lokasi]>$row[deskripsi_lokasi]</option>";
                            }
                          }
                        }
                    ?>
                  </optgroup><hr>
                  <optgroup label="Kantor Production Unit Cilacap">
                    <?php
                      $sql = "SELECT * FROM lokasi WHERE id_kantor= 'PUC'";
                      $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            if($row['id_lokasi'] != $hasil['id_lokasi']){
                              echo "<option value=$row[id_lokasi]>$row[deskripsi_lokasi]</option>";
                            }
                          }
                        }
                    ?>
                  </optgroup><hr>
                  <optgroup label="Kantor Production Unit Gresik">
                    <?php
                      $sql = "SELECT * FROM lokasi WHERE id_kantor= 'PUG'";
                      $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            if($row['id_lokasi'] != $hasil['id_lokasi']){
                              echo "<option value=$row[id_lokasi]>$row[deskripsi_lokasi]</option>";
                            }
                          }
                        }
                    ?>
                  </optgroup><hr>
                  <optgroup label="Kantor Production Unit Jakarta">
                    <?php
                      $sql = "SELECT * FROM lokasi WHERE id_kantor= 'PUJ'";
                      $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            if($row['id_lokasi'] != $hasil['id_lokasi']){
                              echo "<option value=$row[id_lokasi]>$row[deskripsi_lokasi]</option>";
                            }
                          }
                        }
                    ?>
                  </optgroup>
                  </select>
              </div>
              <div class="form-group">
                <label>Kondisi</label>
                  <select type="varchar" class="custom-select rounded-0" name="id_kondisi">
                    <option><?php echo $hasil['kondisi']?></option>
                  <?php
                      $sql = "SELECT * FROM kondisi";
                      $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            if($row['id_kondisi'] != $hasil['kondisi']){
                              echo "<option value=$row[id_kondisi]>$row[id_kondisi]</option>";
                            }
                          }
                        }
                    ?>
                  </select>
              </div>
              <div class="form-group">
                <label>Asal-Usul</label>
                  <input type="varchar" class="form-control" name="asal_usul" value="<?php echo $data["asal_usul"] ?>">
              </div>
              <div class="form-group">
                <label>Harga</label>
                  <input type="int" class="form-control" name="harga" value="<?php echo $data["harga"] ?>">
              </div>
              <div class="form-group">
                <label>Gambar</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="gambar" >
                    </div>  
                  </div>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                  <input type="varchar" class="form-control" rows="3" name="keterangan" value="<?php echo $data["keterangan"] ?>"></input>
              </div>
            </div>
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-primary" name="btn" value="<?php echo $btn ?>" >Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</html>
<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      kode_asset: {
        required: true,
      },
      id_jenis_asset: {
        required: true,
      },
      id_status_kepemilikan: {
        required: true,
      },
      id_lokasi: {
        required: true,
      },
      id_kondisi: {
        required: true,
      },
    },
    messages: {
      kode_asset: {
        required: "Kode Asset Tidak Boleh Kosong",
      },
      id_jenis_asset: {
        required: "Lengkapi Jenis Asset",
      },
      id_status_kepemilikan: {
        required: "Lengkapi Status Kepemilikan Asset",
      },
      id_lokasi: {
        required: "Lengkapi Lokasi Asset",
      },
      id_kondisi: {
        required: "Lengkapi Kondisi Asset",
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