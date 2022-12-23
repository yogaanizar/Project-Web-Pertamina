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
  include '../database/koneksi.php';
  include '../navbar/navbar.php';
?>
<html>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pemeliharaan Asset</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pemeliharaan Asset</a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <?php
      if(isset($_GET['btn'])){
        $button = $_GET['btn'];
      }else{
        $button = 'MInventaris';
      }
      $batas = 50;
      $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
      $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
      $previous = $halaman - 1;
      $next = $halaman + 1;
      if($button == 'MInventaris'){
        $sql = "SELECT * FROM `asset_pemeliharaan`";
        $result = $conn->query($sql);
        $total = mysqli_num_rows($result);
        $total_halaman = ceil($total / $batas);
        $data_asset = mysqli_query($conn,"SELECT * FROM `asset_pemeliharaan` WHERE id_kantor = 'OC' OR id_kantor = 'PUC' OR id_kantor = 'PUG' OR id_kantor = 'PUJ' limit $halaman_awal, $batas");
      }elseif($button == 'MOC'){
        $sql = "SELECT * FROM `asset_pemeliharaan` WHERE id_kantor = 'OC'";
        $result = $conn->query($sql);
        $total = mysqli_num_rows($result);
        $total_halaman = ceil($total / $batas);
        $data_asset = mysqli_query($conn,"SELECT * FROM `asset_pemeliharaan` WHERE id_kantor = 'OC' limit $halaman_awal, $batas");
      }elseif($button == 'MPUC'){
        $sql = "SELECT * FROM `asset_pemeliharaan` WHERE id_kantor = 'PUC'";
        $result = $conn->query($sql);
        $total = mysqli_num_rows($result);
        $total_halaman = ceil($total / $batas);
        $data_asset = mysqli_query($conn,"SELECT * FROM `asset_pemeliharaan` WHERE id_kantor = 'PUC' limit $halaman_awal, $batas");
      }elseif($button == 'MPUG'){
        $sql = "SELECT * FROM `asset_pemeliharaan` WHERE id_kantor = 'PUG'";
        $result = $conn->query($sql);
        $total = mysqli_num_rows($result);
        $total_halaman = ceil($total / $batas);
        $data_asset = mysqli_query($conn,"SELECT * FROM `asset_pemeliharaan` WHERE id_kantor = 'PUG' limit $halaman_awal, $batas");
      }elseif($button == 'MPUJ'){
        $sql = "SELECT * FROM `asset_pemeliharaan` WHERE id_kantor = 'PUJ'";
        $result = $conn->query($sql);
        $total = mysqli_num_rows($result);
        $total_halaman = ceil($total / $batas);
        $data_asset = mysqli_query($conn,"SELECT * FROM `asset_pemeliharaan` WHERE id_kantor = 'PUJ' limit $halaman_awal, $batas");
      }else{
        $sql = "SELECT * FROM `asset_pemeliharaan`";
        $result = $conn->query($sql);
        $total = mysqli_num_rows($result);
        $total_halaman = ceil($total / $batas);
        $data_asset = mysqli_query($conn,"SELECT * FROM `asset_pemeliharaan` limit $halaman_awal, $batas");
      }

      $no = $halaman_awal+1;
        if ($data_asset->num_rows > 0) {
    ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-dark">
                <i class="fa-solid fa-screwdriver-wrench"></i> Asset yang Memerlukan Pemeliharaan 
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped table-responsive">
                  <thead>
                    <tr class="bg-primary">
                      <th><h6 align="center"><b>No</b></h6></th>
                      <th><h6 align="center"><b>Jenis Asset</b></h6></th>
                      <th><h6 align="center"><b>Deskripsi Asset</b></h6></th>
                      <th><h6 align="center"><b>Kode Asset</b></h6></th>
                      <th><h6 align="center"><b>Merk/ Type</b></h6></th>
                      <th><h6 align="center"><b>Jumlah</b></h6></th>
                      <th><h6 align="center"><b>Ukuran</b></h6></th>
                      <th><h6 align="center"><b>Tahun Pengadaan</b></h6></th>
                      <th><h6 align="center"><b>Status Kepemilikan</b></h6></th>
                      <th><h6 align="center"><b>Lokasi</b></h6></th>
                      <th><h6 align="center"><b>Kondisi</b></h6></th>
                      <th><h6 align="center"><b>Asal-usul</b></h6></th>
                      <th><h6 align="center"><b>Harga</b></h6></th>
                      <th><h6 align="center"><b>Gambar</b></h6></th>
                      <th><h6 align="center"><b>Keterangan</b></h6></th>
                      <th><h6 align="center"><b>Tanggal Pemeliharaan</b></h6></th>
                      <th><h6 align="center"><b>Aksi</b></h6></th>
                    </tr>
                  </thead>
                  <?php
                    while ($row = $data_asset->fetch_assoc()) {          
                  ?>                
                  <tbody>
                    <tr>
                      <td><center><?php echo $no++ ; ?></center></td>
                      <td><?php echo $row["jenis_asset"] ?></td>
                      <td><?php echo $row["deskripsi_asset"] ?></td>
                      <td><center><?php echo $row["kode_asset"] ?></center></td>
                      <td><?php echo $row["merk_type"] ?></td>
                      <td><center><?php echo $row["jumlah"] ?></center></td>
                      <td><center><?php echo $row["ukuran"] ?></center></td>
                      <td><center><?php echo $row["tahun_pengadaan"] ?></center></td>
                      <td><?php echo $row["status_kepemilikan"] ?></td>
                      <td><?php echo $row["lokasi"] ?></td>
                      <td><center><?php echo $row["kondisi"] ?></center></td>
                      <td><?php echo $row["asal_usul"] ?></td>
                      <td>Rp. <?php echo $row["harga"] ?></td>
                      <td>
                        <?php 
                          if ( $row["gambar"] == ''){
                        ?>
                          <center>
                          <?php
                            echo "No Image";
                          ?>
                          </center>
                        <?php  
                          }else{
                            echo "<img src='../../GambarAsset/$row[gambar]' width='100'/>";
                          }
                        ?>
                      </td>
                      <td><?php echo $row["pemeliharaan"] ?></td>
                      <td><center><?php echo $row["tanggal_pemeliharaan"] ?></center></td>
                      <td>
                        <center>
                          <button class="btn-success btn btn-md" data-toggle="modal" data-target="#modalHapus<?php echo $row["kode_asset"]?>">
                              <i class="fa-solid fa-square-check"></i>
                          </button>
                        </center>
                          <div class="modal fade" id="modalHapus<?php echo $row["kode_asset"]?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-success">
                                  <h4 class="modal-title"><center>Maintenance</center></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p><h5>Apakah Asset "<?php echo  $row["deskripsi_asset"] ?>" telah Dimaintenance?</h5></p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                  <a href="check.php? kode_asset=<?=$row["kode_asset"]?>&button=<?php echo $button ?>">
                                    <button type="button" class="btn btn-success">Sudah</button>
                                  </a>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                      </td>
                    </tr>
      <?php
                    }
        }else {
      ?>
          <div class="mt-5">
              <center><h4>Tidak ada Asset yang Harus Dimaintenance</h4></center>
          </div> 
      <?php   
        }
        $conn->close();
      ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                  </li>
                  <?php 
                    for($x=1;$x<=$total_halaman;$x++){
                  ?> 
                      <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                  <?php
                    }
                  ?>				
                  <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</html>