<?php 
include '../database/koneksi.php';
    if(isset($_GET['bersihkan'])){
        $bersihkan = $_GET['bersihkan'];
    }

    if($bersihkan=='bersihkan'){
        $query="DELETE FROM history";
        $result = mysqli_query($conn, $query);
        echo '<meta http-equiv="refresh" content="0.1;url=riwayat.php">';
    }
?>