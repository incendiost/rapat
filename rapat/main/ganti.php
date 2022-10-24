<?php
include "koneksi.php";


$nama=$_POST['nama'];
$namanamafoto = $_FILES['logo']['name'];
$lokasilokasifoto =$_FILES['logo']['tmp_name'];
move_uploaded_file($lokasilokasifoto, "img/logo/".$namanamafoto);
$namanama = $_FILES['ikon']['name'];
$lokasilokasi =$_FILES['ikon']['tmp_name'];
move_uploaded_file($lokasilokasi, "img/logo/".$namanama);



  $conn->query("UPDATE profil SET nama='$nama', logo='$namanamafoto', ikon='$namanama'");



echo "<script>alert('Profil Diubah')</script>";

echo "<script>location='index.php?module=profil';</script>";


?>