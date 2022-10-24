<?php
include "koneksi.php";
$id=$_GET['id'];
$mod = $_GET['modul'];

//hapus
if($mod == 'hapus' && $id!=''){
	$idhapus = $id;
	$hapus = "DELETE FROM rapat WHERE idrapat='$idhapus'";
	$delete = mysqli_query($conn, $hapus);

	$hap = "DELETE FROM daftar WHERE idrapat='$idhapus'";
	$delet = mysqli_query($conn, $hap);
	
	header("location:index.php?module=rapat");
	}
	

	
?>