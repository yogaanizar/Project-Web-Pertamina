<?php 
	// mengaktifkan session php
	session_start();
	
	// menghubungkan dengan koneksi
	include '../database/koneksi.php';
	
	// menangkap data yang dikirim dari form
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// menyeleksi data admin dengan username dan password yang sesuai
	$data = mysqli_query($conn,"select * from user where username='$username' and password='$password'");
	$akun = $data->fetch_assoc();
	
	
	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($data);
	
	if($cek > 0){
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "login";
		$_SESSION['jenis_akun'] = $akun['jenis_user'];
		if ($akun["jenis_user"] == "Admin Kantor Pusat") {
			header("location:../dashboard/dashboard.php?akun=$akun");
		}
		else {
			header("location:../../page-menu-user/dashboard/dashboard.php");
		}
	}else{
		header("location:logingagal.php");
	}
?>