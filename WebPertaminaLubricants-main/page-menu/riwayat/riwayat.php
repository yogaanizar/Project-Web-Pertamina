<?php
session_start();
if ($_SESSION['status'] != "login") {
  header("location:../login/login.php?pesan=belum_login");
}
if ($_SESSION['jenis_akun'] != "Admin Kantor Pusat") {
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
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Riwayat Aktivitas Kantor</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Riwayat Aktivitas Kantor</a></li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <?php
  $sql = "SELECT * FROM `history` ORDER BY tanggal DESC";
  $result = $conn->query($sql);
  $no = 1;
  if ($result->num_rows > 0) {
  ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-dark">
                <i class="fa-solid fa-clock-rotate-left"></i> Aktivitas Terbaru
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped table-responsive">
                  <thead>
                    <tr class="bg-primary">
                      <th><h6 align="center"><b>No</b></h6></th>
                      <th style="width: 25% ;"><h6 align="center"><b>Tanggal</b></h6></th>
                      <th style="width: 30% ;"><h6 align="center"><b>Kantor</b></h6></th>
                      <th style="width: 30% ;"><h6 align="center"><b>Aktivitas</b></h6></th>
                      <th style="width: 30% ;"><h6 align="center"><b>Kode Asset</b></h6></th>
                    </tr>
                  </thead>
                  <?php
                  while ($row = $result->fetch_assoc()) {
                  ?>
                    <tbody>
                      <tr>
                        <td>
                          <center><?php echo $no++; ?></center>
                        </td>
                        <td>
                          <center><?php echo $row["tanggal"] ?></center>
                        </td>
                        <td>
                          <center><?php echo $row["kantor"] ?></center>
                        </td>
                        <td>
                          <center><?php echo $row["deskripsi_history"] ?></center>
                        </td>
                        <td>
                          <center><?php echo $row["kode_asset"] ?></center>
                        </td>
                      </tr>
                    <?php
                  }

                    ?>
                    </tbody>
                </table>
                <div class="mt-5">
                  <a href="bersihkanHistory.php? bersihkan=bersihkan">
                    <button class="btn-secondary btn btn-md">Bersihkan</button>
                  </a>
                </div>
              <?php
            } else {
              ?>
                <div class="mt-5">
                  <center>
                    <h4>Tidak ada Aktivitas Terbaru</h4>
                  </center>
                </div>
              <?php
            }
            $conn->close();
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

</html>