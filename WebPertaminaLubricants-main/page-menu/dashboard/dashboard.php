<?php
session_start();
if ($_SESSION['status'] != "login") {
  header("location:../login/login.php?pesan=belum_login");
}
if($_SESSION['jenis_akun'] != "Admin Kantor Pusat"){
  echo '<script type ="text/JavaScript">';  
  echo 'alert("Maaf, Anda bukan Admin Pusat")';  
  echo '</script>'; 
  echo '<meta http-equiv="refresh" content="0.1;url=../../page-menu-user/dashboard/dashboard.php">';
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
          <h1 class="m-0">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row ">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary mr-3">
            <div class="inner">
              <?php
              $sql = "SELECT * FROM asset_inventaris";
              $resultTotal = $conn->query($sql);
              $totalAsset = mysqli_num_rows($resultTotal);
              ?>
              <h3><?php echo $totalAsset ?></h3>
              <p><b>Total Asset</b></p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-coins"></i>
            </div>
            <a href="../inventaris/inventaris.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary mr-3">
            <div class="inner">
              <?php
              $sql = "SELECT * FROM asset_rusak_berat";
              $resultTotal = $conn->query($sql);
              $totalAssetRusakBerat = mysqli_num_rows($resultTotal);
              ?>
              <h3><?php echo $totalAssetRusakBerat ?></h3>
              <p><b>Asset Rusak Berat</b></p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-coins"></i>
            </div>
            <a href="../delete-data/AssetRusakBerat.php" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary mr-3">
            <div class="inner">
              <?php
              $sql = "SELECT * FROM asset_waktu_habis";
              $resultTotal = $conn->query($sql);
              $totalAssetUmurHabis = mysqli_num_rows($resultTotal);
              ?>
              <h3><?php echo $totalAssetUmurHabis ?></h3>
              <p><b>Asset Umur Habis</b></p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-coins"></i>
            </div>
            <a href="../delete-data/AssetUmurHabis.php" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary mr-3">
          <div class="inner">
            <?php
            $sql = "SELECT * FROM asset_pemeliharaan";
            $resultTotal = $conn->query($sql);
            $totalAssetUmurHabis = mysqli_num_rows($resultTotal);
            ?>
            <h3><?php echo $totalAssetUmurHabis ?></h3>
            <p><b>Asset yang memerlukan Pemeliharaan</b></p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-coins"></i>
          </div>
          <a href="../maintenance/maintenance.php" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <div class="row ml-3 mr-3 mt-4">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary mr-3 ml-3">
          <div class="inner">
            <?php
            $sql = "SELECT * FROM asset_oc";
            $resultTotalOC = $conn->query($sql);
            $totalAssetOC = mysqli_num_rows($resultTotalOC);
            ?>
            <h3><?php echo $totalAssetOC ?></h3>
            <p><b>Office Center</b></p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-coins"></i>
          </div>
          <a href="../list-kantor/OC.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary mr-3 ml-3">
          <div class="inner">
            <?php
            $sql = "SELECT * FROM asset_puc";
            $resultTotalPUC = $conn->query($sql);
            $totalAssetPUC = mysqli_num_rows($resultTotalPUC);
            ?>
            <h3><?php echo $totalAssetPUC ?></h3>
            <p><b>Production Unit Cilacap</b></p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-coins"></i>
          </div>
          <a href="../list-kantor/PUC.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary mr-3 ml-3">
          <div class="inner">
            <?php
            $sql = "SELECT * FROM asset_pug";
            $resultTotalPUG = $conn->query($sql);
            $totalAssetPUG = mysqli_num_rows($resultTotalPUG);
            ?>
            <h3><?php echo $totalAssetPUG ?></h3>
            <p><b>Production Unit Gresik</b></p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-coins"></i>
          </div>
          <a href="../list-kantor/PUG.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary mr-3 ml-3">
          <div class="inner">
            <?php
            $sql = "SELECT * FROM asset_puJ";
            $resultTotalPUJ = $conn->query($sql);
            $totalAssetPUJ = mysqli_num_rows($resultTotalPUJ);
            ?>
            <h3><?php echo $totalAssetPUJ ?></h3>
            <p><b>Production Unit Jakarta</b></p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-coins"></i>
          </div>
          <a href="../list-kantor/PUJ.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
</div>
<aside class="control-sidebar control-sidebar-dark"></aside>
</div>

</html>