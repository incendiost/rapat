<?php
include "koneksi.php";

/* fungsi untuk menghindari injeksi dari user yang jahil
function anti_injection($data){
  $filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  return $filter;
}
*/
//$username = anti_injection($_POST['username']);
//$password = anti_injection(md5($_POST['password']));
$username = $_POST['username'];
$password = $_POST['password'];

// menghindari sql injection
//$injeksi_username = mysqli_real_escape_string($conn, $username);
//$injeksi_password = mysqli_real_escape_string($conn, $password);

/* pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($injeksi_username) OR !ctype_alnum($injeksi_password)){
  echo "Sekarang loginnya tidak bisa di injeksi lho.";
}
else{*/
  $query  = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $login  = mysqli_query($conn, $query);
  $ketemu = mysqli_num_rows($login);
  $r      = mysqli_fetch_array($login);

  // Apabila username dan password ditemukan (benar)
  if ($ketemu > 0){
    session_start();

    // bikin variabel session
    $_SESSION['namauser']    = $r['username'];
    $_SESSION['passuser']    = $r['password'];
    $_SESSION['nama']        = $r['nama'];
    $_SESSION['leveluser']   = $r['level'];
     

    header("location:main/index.php");
  }
  else{
    header("location:login.php");
  }
//}
?>
