<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  header("location:login.php");
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
	header("location:main/index.php");	
}
?>