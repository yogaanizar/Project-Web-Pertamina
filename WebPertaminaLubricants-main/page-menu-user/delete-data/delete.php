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
        $query="UPDATE asset SET status_request_hapus = 1 WHERE kode_asset = '$kode'";
        $result = mysqli_query($conn, $query);
        if($result){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Request Berhasil Dikirimkan")';  
            echo '</script>'; 
            if($button =='hapusOC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/OC.php">';
            }elseif($button =='hapusPUC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUC.php">';
            }elseif($button =='hapusPUG'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUG.php">';
            }elseif($button =='hapusPUJ'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUJ.php">';
            }elseif($button =='hapusCari'){
                echo '<meta http-equiv="refresh" content="0.1;url=../cari-data/cariData.php">';
            }elseif($button =='RBOC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/OC.php">';
            }elseif($button =='UHOC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/OC.php">';
            }elseif($button =='RBPUC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUC.php">';
            }elseif($button =='UHPUC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUC.php">';
            }elseif($button =='RBPUG'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUG.php">';
            }elseif($button =='UHPUG'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUG.php">';
            }elseif($button =='RBPUJ'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUJ.php">';
            }elseif($button =='UHPUJ'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUJ.php">';
            }
        }else{
            echo "Asset Gagal Dihapus !";
        }
    }else{
        $query="UPDATE asset SET status_request_hapus = 1 WHERE kode_asset = '$kode'";
        $result = mysqli_query($conn, $query);
        if($result){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Request Berhasil Dikirimkan")';  
            echo '</script>'; 
            if($button =='hapusOC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/OC.php">';
            }elseif($button =='hapusPUC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUC.php">';
            }elseif($button =='hapusPUG'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUG.php">';
            }elseif($button =='hapusPUJ'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUJ.php">';
            }elseif($button =='hapusCari'){
                echo '<meta http-equiv="refresh" content="0.1;url=../cari-data/cariData.php">';
            }elseif($button =='RBOC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/OC.php">';
            }elseif($button =='UHOC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/OC.php">';
            }elseif($button =='RBPUC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUC.php">';
            }elseif($button =='UHPUC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUC.php">';
            }elseif($button =='RBPUG'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUG.php">';
            }elseif($button =='UHPUG'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUG.php">';
            }elseif($button =='RBPUJ'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUJ.php">';
            }elseif($button =='UHPUJ'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUJ.php">';
            }
        }else{
            echo "Asset Gagal Dihapus !";
        }
    }

?>