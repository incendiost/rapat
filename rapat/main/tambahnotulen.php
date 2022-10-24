<?php
include "koneksi.php";


$nama=$_POST['nama'];
$user=$_POST['username'];
$password=$_POST['password'];
$level=$_POST['level'];
$namanamafoto = $_FILES['foto']['name'];
$lokasilokasifoto =$_FILES['foto']['tmp_name'];
move_uploaded_file($lokasilokasifoto, "img/".$namanamafoto);



  $conn->query("INSERT INTO admin(nama, username, password, level, foto) VALUES ('$nama', '$user', '$password', '$level', '$namanamafoto')");



echo "<script>alert('Notulen Sudah Ditambah')</script>";

echo "<script>location='index.php?module=user';</script>";


?>