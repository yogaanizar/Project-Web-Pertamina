<?php 
    include '../database/koneksi.php';
    include '../navbar/header.php';

    

    if(isset($_GET['kode_asset'])){
        $kode = $_GET['kode_asset'];
    }
    if(isset($_GET['button'])){
        $button = $_GET['button'];
    }else{
        $button = 'maintenance';
    }
    $query1 = "SELECT * FROM asset WHERE kode_asset = '$kode'";
    $result1 = mysqli_query($conn, $query1);
    $row = $result1->fetch_assoc();
    $jenis_asset = $row['id_jenis_asset'];
    $lokasi = $row['id_lokasi'];

    $query2 = "SELECT * FROM lokasi WHERE id_lokasi = '$lokasi'";
    $result2 = mysqli_query($conn, $query2);
    $row2 = $result2->fetch_assoc();
    $kantors = $row2['id_kantor'];
    if($kantors == 'OC'){
        $vKantor = 'Office Center';
    }elseif($kantors == 'PUC'){
        $vKantor = 'Production Unit Cilacap';
    }elseif($kantors == 'PUG'){
        $vKantor = 'Production Unit Gresik';
    }elseif($kantors == 'PUJ'){
        $vKantor = 'Production Unit Jakarta';
    }

    if($button =='MOC'){
        $kantor = 'Office Center';
    }elseif($button =='MPUC'){
        $kantor = 'Production Unit Cilacap';
    }elseif($button =='MPUG'){
        $kantor = 'Production Unit Gresik';
    }elseif($button =='MPUJ'){
        $kantor = 'Production Unit Jakarta';
    }elseif($button == 'maintenance'){
        $kantor = $vKantor;
    }

    if($jenis_asset == 'AlatBerat'){
        $query = "UPDATE asset SET tanggal_pemeliharaan = DATE_ADD(curdate(), INTERVAL 4 MONTH) WHERE kode_asset = '$kode'";
    }elseif($jenis_asset == 'KDR'){
        $query = "UPDATE asset SET tanggal_pemeliharaan = DATE_ADD(curdate(), INTERVAL 3 MONTH) WHERE kode_asset = '$kode'";
    }elseif($jenis_asset == 'AssetKtr'){
        $query = "UPDATE asset SET tanggal_pemeliharaan = DATE_ADD(curdate(), INTERVAL 1 MONTH) WHERE kode_asset = '$kode'";
    }elseif($jenis_asset == 'Tanah'){
        $query = "UPDATE asset SET tanggal_pemeliharaan = DATE_ADD(curdate(), INTERVAL 1 YEAR) WHERE kode_asset = '$kode'";
    }
    $result = mysqli_query($conn, $query);
        if($result){
            $query1 = "INSERT INTO `history` (`kode_asset`, `deskripsi_history`, `kantor`) 
            VALUES ('$kode', 'Maintenance', '$kantor')" ;
            $result1 = mysqli_query($conn, $query1);
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Asset Telah Dimaintenance")';  
            echo '</script>'; 
            if($button =='maintenance'){
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

