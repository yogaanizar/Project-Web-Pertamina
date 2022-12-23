<?php
include '../database/koneksi.php';

$kode_asset = $_POST['kode_asset'];
$id_kondisi = $_POST['id_kondisi'];
$id_status_kepemilikan = $_POST['id_status_kepemilikan'];
$id_lokasi = $_POST['id_lokasi'];
$id_jenis_asset = $_POST['id_jenis_asset'];
$deskripsi_asset = $_POST['deskripsi_asset'];
$jumlah = $_POST['jumlah'];
$ukuran = $_POST['ukuran'];
$tahun_pengadaan = $_POST['tahun_pengadaan'];
$pemeliharaan = $_POST['pemeliharaan'];
$tanggal_pemeliharaan = $_POST['tanggal_pemeliharaan'];
if($tanggal_pemeliharaan== date(0000-00-00)){
  $tanggal_pemeliharaan = NULL;
}
$asal_usul = $_POST['asal_usul'];
$harga = $_POST['harga'];
$gambar = $_FILES["gambar"]["name"];
$keterangan = $_POST['keterangan'];
$merk_type = $_POST['merk_type'];
$btn = $_POST['btn'];

$query = mysqli_query($conn, " SELECT * FROM asset WHERE kode_asset = '$kode_asset'");
$data = mysqli_fetch_array($query);
if ($gambar != '') {
  if($data['gambar'] != ''){
    $temp_name = $_FILES["gambar"]["tmp_name"];
    $folder = "../../GambarAsset/" . $gambar;
    unlink("../../GambarAsset/$data[gambar]");
    move_uploaded_file($temp_name, '../../GambarAsset/' . $gambar);
  }else{
    $temp_name = $_FILES["gambar"]["tmp_name"];
    $folder = "../../GambarAsset/" . $gambar;
    move_uploaded_file($temp_name, '../../GambarAsset/' . $gambar);
  }
  if ($tahun_pengadaan == '') {
    $query = "UPDATE `asset` SET kode_asset='$kode_asset',id_kondisi='$id_kondisi',id_status_kepemilikan='$id_status_kepemilikan',
                                   id_lokasi='$id_lokasi',id_jenis_asset='$id_jenis_asset', deskripsi_asset='$deskripsi_asset',jumlah='$jumlah', 
                                   ukuran='$ukuran',tahun_pengadaan=year(curdate()),asal_usul='$asal_usul',harga='$harga',gambar= '$gambar',
                                   keterangan='$keterangan', merk_type='$merk_type', pemeliharaan='$pemeliharaan', tanggal_pemeliharaan='$tanggal_pemeliharaan' WHERE kode_asset='$kode_asset'";
  } else {
    $query = "UPDATE `asset` SET kode_asset='$kode_asset',id_kondisi='$id_kondisi',id_status_kepemilikan='$id_status_kepemilikan',
                                   id_lokasi='$id_lokasi',id_jenis_asset='$id_jenis_asset', deskripsi_asset='$deskripsi_asset',jumlah='$jumlah', 
                                   ukuran='$ukuran',tahun_pengadaan='$tahun_pengadaan',asal_usul='$asal_usul',harga='$harga',gambar= '$gambar',
                                   keterangan='$keterangan', merk_type='$merk_type', pemeliharaan='$pemeliharaan', tanggal_pemeliharaan='$tanggal_pemeliharaan' WHERE kode_asset='$kode_asset'";
  }
  $result = mysqli_query($conn, $query);
  if ($result) {
    echo '<script type ="text/JavaScript">';
    echo 'alert("DATA BERHASIL DI UPDATE")';
    echo '</script>';
    if ($btn == 'btnEditInventaris') {
      echo '<meta http-equiv="refresh" content="0.1;url=../inventaris/inventaris.php">';
    } elseif ($btn == 'btnEditOC') {
      echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/OC.php">';
    } elseif ($btn == 'btnEditPUC') {
      echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUC.php">';
    } elseif ($btn == 'btnEditPUG') {
      echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUG.php">';
    } elseif ($btn == 'btnEditPUJ') {
      echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUJ.php">';
    } elseif ($btn == 'btnEditCari') {
      echo '<meta http-equiv="refresh" content="0.1;url=../cari-data/cariData.php">';
    } else {
      echo '<meta http-equiv="refresh" content="0.1;url=../inventaris/inventaris.php">';
    }
  } else {
    echo '<script type ="text/JavaScript">';
    echo 'alert("UPDATE GAGAL")';
    echo '</script>';
    echo '<meta http-equiv="refresh" content="0.1;url=editAsset.php">';
  }
} else {
  if ($tahun_pengadaan == '') {
    $query = "UPDATE `asset` SET kode_asset='$kode_asset',id_kondisi='$id_kondisi',id_status_kepemilikan='$id_status_kepemilikan',
        id_lokasi='$id_lokasi',id_jenis_asset='$id_jenis_asset', deskripsi_asset='$deskripsi_asset',jumlah='$jumlah', 
        ukuran='$ukuran',tahun_pengadaan=year(curdate()),asal_usul='$asal_usul',harga='$harga',
        keterangan='$keterangan', merk_type='$merk_type', pemeliharaan='$pemeliharaan', tanggal_pemeliharaan='$tanggal_pemeliharaan' WHERE kode_asset='$kode_asset'";
  } else {
    $query = "UPDATE `asset` SET kode_asset='$kode_asset',id_kondisi='$id_kondisi',id_status_kepemilikan='$id_status_kepemilikan',
        id_lokasi='$id_lokasi',id_jenis_asset='$id_jenis_asset', deskripsi_asset='$deskripsi_asset',jumlah='$jumlah', 
        ukuran='$ukuran',tahun_pengadaan='$tahun_pengadaan',asal_usul='$asal_usul',harga='$harga',
        keterangan='$keterangan', merk_type='$merk_type', pemeliharaan='$pemeliharaan', tanggal_pemeliharaan='$tanggal_pemeliharaan' WHERE kode_asset='$kode_asset'";
  }
  $result = mysqli_query($conn, $query);
  if ($result) {
    echo '<script type ="text/JavaScript">';
    echo 'alert("DATA BERHASIL DI UPDATE")';
    echo '</script>';
    if ($btn == 'btnEditInventaris') {
      echo '<meta http-equiv="refresh" content="0.1;url=../inventaris/inventaris.php">';
    } elseif ($btn == 'btnEditOC') {
      echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/OC.php">';
    } elseif ($btn == 'btnEditPUC') {
      echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUC.php">';
    } elseif ($btn == 'btnEditPUG') {
      echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUG.php">';
    } elseif ($btn == 'btnEditPUJ') {
      echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUJ.php">';
    } elseif ($btn == 'btnEditCari') {
      echo '<meta http-equiv="refresh" content="0.1;url=../cari-data/cariData.php">';
    } else {
      echo '<meta http-equiv="refresh" content="0.1;url=../inventaris/inventaris.php">';
    }
  } else {
    echo '<script type ="text/JavaScript">';
    echo 'alert("UPDATE GAGAL LUR")';
    echo '</script>';
    echo '<meta http-equiv="refresh" content="0.1;url=editAsset.php">';
  }
}
