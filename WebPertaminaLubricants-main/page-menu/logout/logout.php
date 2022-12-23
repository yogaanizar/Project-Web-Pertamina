<?php
    session_start();
    session_destroy();
    echo '<script type ="text/JavaScript">';  
    echo 'alert("LOGOUT BERHASIL")';  
    echo '</script>'; 
    echo '<meta http-equiv="refresh" content="0.1;url=../login/login.php">';
    exit;
?>