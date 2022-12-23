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
$asal_usul = $_POST['asal_usul'];
$harga = $_POST['harga'];
$gambar = $_FILES["gambar"]["name"];
$keterangan = $_POST['keterangan'];
$merk_type = $_POST['merk_type'];
$button = $_POST['button'];

$temp_name = $_FILES["gambar"]["tmp_name"];
$folder = "../../GambarAsset/" . $gambar;
//move_uploaded_file($temp_name, '../../GambarAsset/'.$gambar);
move_uploaded_file($temp_name, $folder);
if ($tahun_pengadaan == '') {
  $query = "INSERT INTO `asset` (`kode_asset`, `id_kondisi`, `id_status_kepemilikan`, `id_lokasi`, `id_jenis_asset`, `deskripsi_asset`, `jumlah`, `ukuran`, `asal_usul`, `harga`, `gambar`, `keterangan`, `merk_type`, `pemeliharaan`, `tanggal_pemeliharaan`) 
                          VALUES ('$kode_asset', '$id_kondisi', '$id_status_kepemilikan', '$id_lokasi', '$id_jenis_asset', '$deskripsi_asset', '$jumlah', '$ukuran', '$asal_usul', '$harga', '$gambar', '$keterangan', '$merk_type', '$pemeliharaan', '$tanggal_pemeliharaan')";
} else {
  $query = "INSERT INTO `asset` (`kode_asset`, `id_kondisi`, `id_status_kepemilikan`, `id_lokasi`, `id_jenis_asset`, `deskripsi_asset`, `jumlah`, `ukuran`, `tahun_pengadaan`, `asal_usul`, `harga`, `gambar`, `keterangan`, `merk_type`, `pemeliharaan`, `tanggal_pemeliharaan`) 
                          VALUES ('$kode_asset', '$id_kondisi', '$id_status_kepemilikan', '$id_lokasi', '$id_jenis_asset', '$deskripsi_asset', '$jumlah', '$ukuran', '$tahun_pengadaan', '$asal_usul', '$harga', '$gambar', '$keterangan', '$merk_type', '$pemeliharaan', '$tanggal_pemeliharaan')";
}
$result = mysqli_query($conn, $query);
if ($result) {
  echo '<script type ="text/JavaScript">';
  echo 'alert("Asset Berhasil Ditambahkan !!!")';
  echo '</script>';
  if ($button == 'inputInventaris') {
    echo '<meta http-equiv="refresh" content="0.1;url=../inventaris/inventaris.php">';
  } elseif ($button == 'inputOC') {
    echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/OC.php">';
  } elseif ($button == 'inputPUC') {
    echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUC.php">';
  } elseif ($button == 'inputPUG') {
    echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUG.php">';
  } elseif ($button == 'inputPUJ') {
    echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUJ.php">';
  } else {
    echo '<meta http-equiv="refresh" content="0.1;url=../inventaris/inventaris.php">';
  }
} else {
  echo '<script type ="text/JavaScript">';
  echo 'alert("Kode Asset Tersedia... Asset Gagal Ditambahkan !")';
  echo '</script>';
  if ($button == 'inputInventaris') {
    echo '<meta http-equiv="refresh" content="0.1;url=inputData.php">';
  } elseif ($button == 'inputOC') {
    echo '<meta http-equiv="refresh" content="0.1;url=inputDataOC.php">';
  } elseif ($button == 'inputPUC') {
    echo '<meta http-equiv="refresh" content="0.1;url=inputDataPUC.php">';
  } elseif ($button == 'inputPUG') {
    echo '<meta http-equiv="refresh" content="0.1;url=inputDataPUG.php">';
  } elseif ($button == 'inputPUJ') {
    echo '<meta http-equiv="refresh" content="0.1;url=inputDataPUJ.php">';
  } else {
    echo '<meta http-equiv="refresh" content="0.1;url=inputData.php">';
  }
}
