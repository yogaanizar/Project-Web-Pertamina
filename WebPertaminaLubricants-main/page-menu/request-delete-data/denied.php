<?php
    include '../database/koneksi.php';
    include '../navbar/header.php';
    if(isset($_GET['kode_asset'])){
        $kode = $_GET['kode_asset'];
    }else{
        die("Error! Asset tidak ditemukan");
    }
    $query="UPDATE asset SET status_request_hapus = 0 WHERE kode_asset = '$kode'";
    $result = mysqli_query($conn, $query);
    if($result){
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Asset Ditolak untuk Dihapus!!")';  
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0.1;url=requestDeleteData.php">';
    }else{
        echo "Asset Gagal Dihapus !";
    }
?>