<?php
include "koneksi.php";
$id=$_GET['id'];
$mod = $_GET['modul'];

//hapus
if($mod == 'hapus' && $id!=''){
	$idhapus = $id;
	$hapus = "DELETE FROM admin WHERE idadmin='$idhapus'";
	$delete = mysqli_query($conn, $hapus);

	
	header("location:index.php?module=user");
	}
	

	
?>