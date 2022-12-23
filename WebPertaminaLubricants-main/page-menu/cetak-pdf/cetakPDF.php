<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../login/login.php?pesan=belum_login");
	}
  if($_SESSION['jenis_akun'] != "Admin Kantor Pusat"){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Maaf, Anda bukan Admin Pusat")';  
    echo '</script>'; 
    echo '<meta http-equiv="refresh" content="0.1;url=../../page-menu-user/dashboard/dashboard.php">';
  }
  ?>
<?php

    include '../navbar/navbar.php';

?>
<html>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cetak Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cetak Laporan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid ml-2 mr-2">
      <div class="row ">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary mr-3">
            <div class="inner">
              <h4><b>Asset</b></h4>
              <h5><b>Kantor Pusat OC</b></5>
            </div>
            <div class="icon">
              <i class="fa-solid fa-book"></i>
            </div>
              <a href="pdfoc.php" class="small-box-footer">Cetak PDF <i class="fa-solid fa-print"></i></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary mr-3">
            <div class="inner">
              <h4><b>Asset</b></h4>
              <h5><b>Production Unit Cilacap</b></5>
            </div>
            <div class="icon">
              <i class="fa-solid fa-book"></i>
            </div>
              <a href="pdfpuc.php" class="small-box-footer">Cetak PDF <i class="fa-solid fa-print"></i></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary mr-3">
            <div class="inner">
              <h4><b>Asset</b></h4>
              <h5><b>Production Unit Gresik</b></5>
            </div>
            <div class="icon">
              <i class="fa-solid fa-book"></i>
            </div>
              <a href="pdfpug.php" class="small-box-footer">Cetak PDF <i class="fa-solid fa-print"></i></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary mr-3">
            <div class="inner">
              <h4><b>Asset</b></h4>
              <h5><b>Prodcution Unit Jakarta</b></5>
            </div>
            <div class="icon">
              <i class="fa-solid fa-book"></i>
            </div>
              <a href="pdfpuj.php" class="small-box-footer">Cetak PDF <i class="fa-solid fa-print"></i></i></a>
          </div>
        </div>
        </div>
    </div>
    
    
</html>