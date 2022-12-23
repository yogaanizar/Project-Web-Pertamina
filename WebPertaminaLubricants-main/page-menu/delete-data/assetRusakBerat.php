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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penghapusan Asset</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Penghapusan Asset</a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <?php
    if(isset($_GET['btn'])){
      $button = $_GET['btn'];
    }else{
      $button = 'btn';
    }

    if($button == 'RBInventaris'){
      $sql = "SELECT * FROM `asset_rusak_berat`";
    }elseif($button == 'RBOC'){
      $sql = "SELECT * FROM `asset_rusak_berat`WHERE id_kantor = 'OC'";
    }elseif($button == 'RBPUC'){
      $sql = "SELECT * FROM `asset_rusak_berat`WHERE id_kantor = 'PUC'";
    }elseif($button == 'RBPUG'){
      $sql = "SELECT * FROM `asset_rusak_berat`WHERE id_kantor = 'PUG'";
    }elseif($button == 'RBPUJ'){
      $sql = "SELECT * FROM `asset_rusak_berat`WHERE id_kantor = 'PUJ'";
    }else{
      $sql = "SELECT * FROM `asset_rusak_berat`";
    }
      $result = $conn->query($sql);
      $total = mysqli_num_rows($result);
      $no = 0;
        if ($result->num_rows > 0) {
    ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-dark">
                <i class="fa-solid fa-circle-exclamation"></i> Asset Rusak Berat
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
                    while ($row = $result->fetch_assoc()) {
                      $no += 1;           
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
                      <td><?php echo $row["keterangan"] ?></td>
                      <td><center><?php echo $row["tanggal_pemeliharaan"] ?></center></td>
                      <td>
                        <center>
                          <button class="btn-danger btn btn-md" data-toggle="modal" data-target="#modalHapus<?php echo $row["kode_asset"]?>">
                            <i class="fa-solid fa-trash"></i>
                          </button>
                        </center>
                          <div class="modal fade" id="modalHapus<?php echo $row["kode_asset"]?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-danger">
                                  <h4 class="modal-title"><center>Hapus Item</center></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p><h5>Yakin Untuk Menghapus Asset "<?php echo  $row["deskripsi_asset"] ?>" ?</h5></p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                  <a href="../delete-data/delete.php? kode_asset=<?=$row["kode_asset"]?>&button=hapusRB">
                                    <button type="button" class="btn btn-danger">Hapus</button>
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
              <center><h4>Tidak ada Asset Rusak Berat</h4></center>
          </div> 
      <?php   
        }
        $conn->close();
      ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</html>