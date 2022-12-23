<?php 
    include '../database/koneksi.php';
    include '../navbar/header.php';

    if(isset($_GET['kode_asset'])){
        $kode = $_GET['kode_asset'];
    }else{
        die("Error! Asset tidak ditemukan");
    }
    if(isset($_GET['button'])){
        $button = $_GET['button'];
    }else{
        die("Error! Tombol tidak ditemukan");
    }

    $query = mysqli_query($conn, " SELECT * FROM asset WHERE kode_asset = '$kode'");
    $data = mysqli_fetch_array($query);
    if($data['gambar'] != ''){
        $query="DELETE FROM asset WHERE kode_asset = '$kode'";
        $result = mysqli_query($conn, $query);
        if($result){
            unlink("../../GambarAsset/$data[gambar]");
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Asset Berhasil Dihapus")';  
            echo '</script>'; 
            if($button =='hapusInventaris'){
                echo '<meta http-equiv="refresh" content="0.1;url=../inventaris/inventaris.php">';
            }elseif($button =='hapusOC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/OC.php">';
            }elseif($button =='hapusPUC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUC.php">';
            }elseif($button =='hapusPUG'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUG.php">';
            }elseif($button =='hapusPUJ'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUJ.php">';
            }elseif($button =='hapusData'){
                echo '<meta http-equiv="refresh" content="0.1;url=deleteData.php">';
            }elseif($button =='hapusCari'){
                echo '<meta http-equiv="refresh" content="0.1;url=../cari-data/cariData.php">';
            }elseif($button =='hapusRB'){
                echo '<meta http-equiv="refresh" content="0.1;url=../inventaris/inventaris.php">';
            }elseif($button =='hapusUmurHabis'){
                echo '<meta http-equiv="refresh" content="0.1;url=../inventaris/inventaris.php">';
            }else{
                echo '<meta http-equiv="refresh" content="0.1;url=../inventaris/inventaris.php">';
            }
        }else{
            echo "Asset Gagal Dihapus !";
        }
    }else{
        $query="DELETE FROM asset WHERE kode_asset = '$kode'";
        $result = mysqli_query($conn, $query);
        if($result){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Asset Berhasil Dihapus")';  
            echo '</script>'; 
            if($button =='hapusInventaris'){
                echo '<meta http-equiv="refresh" content="0.1;url=../inventaris/inventaris.php">';
            }elseif($button =='hapusOC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/OC.php">';
            }elseif($button =='hapusPUC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUC.php">';
            }elseif($button =='hapusPUG'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUG.php">';
            }elseif($button =='hapusPUJ'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUJ.php">';
            }elseif($button =='hapusData'){
                echo '<meta http-equiv="refresh" content="0.1;url=deleteData.php">';
            }elseif($button =='hapusCari'){
                echo '<meta http-equiv="refresh" content="0.1;url=../cari-data/cariData.php">';
            }elseif($button =='hapusRB'){
                echo '<meta http-equiv="refresh" content="0.1;url=../inventaris/inventaris.php">';
            }elseif($button =='hapusUmurHabis'){
                echo '<meta http-equiv="refresh" content="0.1;url=../inventaris/inventaris.php">';
            }else{
                echo '<meta http-equiv="refresh" content="0.1;url=../inventaris/inventaris.php">';
            }
        }else{
            echo "Asset Gagal Dihapus !";
        }
    }

?>