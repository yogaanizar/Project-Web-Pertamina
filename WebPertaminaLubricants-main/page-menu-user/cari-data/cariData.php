<?php 
	session_start();
    if($_SESSION['status']!="login"){
      header("location:../login/login.php?pesan=belum_login");
    }
  include '../database/koneksi.php';
  include '../navbar/navbar.php';
?>
<html>
  <style>
    .mt--5 {
      margin-top : -26px;
    }
  </style>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pencarian Asset</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pencarian Asset</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <h3 class="text-center display-5"><b>Search</b></h3>
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <form action="cariData.php" method="POST">
                <div class="input-group">
                  <input type="text" class="form-control form-control-lg" placeholder="Masukkan Kata Kunci" name="keyword">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-lg btn-default">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                </div>
              </form>
            </div>
          </div>
      </div>
    </section>
    <?php
      if(isset($_POST['keyword'])){
        $keyword = $_POST['keyword'];
        $sql = "SELECT * FROM asset_inventaris WHERE `jenis_asset` LIKE '%$keyword%' OR `deskripsi_asset` LIKE '%$keyword%' OR `kode_asset` LIKE '%$keyword%' 
                OR `merk_type` LIKE '%$keyword%' OR `jumlah` LIKE '%$keyword%' OR `ukuran` LIKE '%$keyword%' OR `tahun_pengadaan` LIKE '%$keyword%' 
                OR `status_kepemilikan` LIKE '%$keyword%' OR `lokasi` LIKE '%$keyword%' OR kondisi LIKE '%$keyword%' OR `asal_usul` LIKE '%$keyword%' 
                OR `harga` LIKE '%$keyword%'";
        $result = $conn->query($sql);
        $no = 0;
        if ($result->num_rows > 0) {
    ?>
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
        <tbody>
          <?php
            while($row = $result->fetch_assoc()) {
              $no += 1;
          ?>   
          <tr>
            <td><center><?php echo $no ; ?></center></td>
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
              <div>
                <center>
                  <a href="../input-data/editAsset.php? kode_asset=<?=$row["kode_asset"]?>& btn=btnEditCari">
                    <button class="btn-primary btn btn-md">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                  </a> 
                </center>
              </div>
              <?php 
                if($row["status_request_hapus"]==1){
              ?>
              <div class="mt-2">
                <center>
                  <button class="btn-success btn btn-md">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </center>
              </div>
              <?php
                }else{
              ?>
              <div class="mt-2">
                <center>
                  <button class="btn-danger btn btn-md" data-toggle="modal" data-target="#modalHapus<?php echo $row["kode_asset"]?>">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </center>
              </div>
              <?php
                }
              ?> 
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
                      <p><h5>Request Asset "<?php echo  $row["deskripsi_asset"] ?>" untuk Dihapus ?</h5></p>
                  </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <a href="../delete-data/delete.php? kode_asset=<?=$row["kode_asset"]?>&button=hapusCari">
                <button type="button" class="btn btn-danger">Request</button>
              </a>
            </td>
          </tr>
      <?php
            }
        }else{
      ?>
      <div class="mt-5">
        <center>
          <h4>Data Tidak Ditemukan !</h4>
        </center>
      </div>
    <?php
        }
        $conn->close();
      }
    ?> 
        </tbody>
      </table>
    </div>
  </div>
</html>