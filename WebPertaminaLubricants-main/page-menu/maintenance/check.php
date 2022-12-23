<?php 
    include '../database/koneksi.php';
    include '../navbar/header.php';

    if(isset($_GET['kode_asset'])){
        $kode = $_GET['kode_asset'];
    }
    if(isset($_GET['button'])){
        $button = $_GET['button'];
    }
    $query1 = "SELECT * FROM asset WHERE kode_asset = '$kode'";
    $result1 = mysqli_query($conn, $query1);
    $row = $result1->fetch_assoc();
    $jenis_asset = $row['id_jenis_asset'];
    if($jenis_asset == 'AlatBerat'){
        $query = "UPDATE asset SET tanggal_pemeliharaan = DATE_ADD(curdate(), INTERVAL 4 MONTH) WHERE kode_asset = '$kode'";
    }elseif($jenis_asset == 'AssetKtr'){
        $query = "UPDATE asset SET tanggal_pemeliharaan = DATE_ADD(curdate(), INTERVAL 1 MONTH) WHERE kode_asset = '$kode'";
    }elseif($jenis_asset == 'Tanah'){
        $query = "UPDATE asset SET tanggal_pemeliharaan = DATE_ADD(curdate(), INTERVAL 1 YEAR) WHERE kode_asset = '$kode'";
    }elseif($jenis_asset == 'KDR'){
        $query = "UPDATE asset SET tanggal_pemeliharaan = DATE_ADD(curdate(), INTERVAL 3 MONTH) WHERE kode_asset = '$kode'";
    }
    $result = mysqli_query($conn, $query);
        if($result){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Asset Telah Diperbaiki")';  
            echo '</script>'; 
            if($button =='MInventaris'){
                echo '<meta http-equiv="refresh" content="0.1;url=maintenance.php">';
            }elseif($button =='MOC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/OC.php">';
            }elseif($button =='MPUC'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUC.php">';
            }elseif($button =='MPUG'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUG.php">';
            }elseif($button =='MPUJ'){
                echo '<meta http-equiv="refresh" content="0.1;url=../list-kantor/PUJ.php">';
            }else{
                echo '<meta http-equiv="refresh" content="0.1;url=maintenance.php">';
            }
        }else{
            echo "Asset Gagal Diperbaiki !";
        }
?>