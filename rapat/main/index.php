<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  header("location:../login.php");
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
	$jeneng = $_SESSION['namauser'];



include "koneksi.php";
$status=$_SESSION['leveluser'];
$data= mysqli_query($conn,"SELECT * FROM admin WHERE level='$status'");
                $t=mysqli_fetch_array($data);

$a= mysqli_query($conn,"SELECT * FROM profil");
                $tam=mysqli_fetch_array($a);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/<?php echo $tam['ikon'] ?>" rel="icon">
  <title><?php echo $tam['nama'] ?></title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="js/Chart.js"></script>
  
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="img/logo/bogor.png">
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $tam['nama'] ?></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?module=dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>DASHBOARD</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        MENU
      </div>
      
      <?php
	  if($_SESSION['leveluser']=='admin'){
	  
	  ?>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?module=agenda">
          <i><img src="img/agenda1.png" ></i>
          <span>AGENDA</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?module=rapat">
          <i><img src="img/rapat1.png" ></i>
          <span>RAPAT</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?module=laporan">
          <i><img src="img/report1.png" ></i>
          <span>LAPORAN</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="false" aria-controls="collapseBootstrap">
          <i><img src="img/setting1.png" ></i>
          <span>PENGATURAN</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar" style="">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?module=user"><img src="img/user1.png"> USER</a>
            <a class="collapse-item" href="index.php?module=profil"><img src="img/profil1.png"> PROFIL</a>
          </div>
        </div>
      </li>
      <?php
	  }else if($_SESSION['leveluser']=='notulen'){
	  ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?module=rapat">
          <i><img src="img/rapat1.png" ></i>
          <span>RAPAT</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?module=laporan">
          <i><img src="img/report1.png" ></i>
          <span>LAPORAN</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="false" aria-controls="collapseBootstrap">
          <i><img src="img/setting1.png" ></i>
          <span>PENGATURAN</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar" style="">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?module=user"><img src="img/user1.png"> USER</a>
          </div>
        </div>
      </li>
    <?php } ?>
      
      
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <?php $date = date('Y-m-d'); ?>
                <?php echo date("l, d F Y ", strtotime($date))?>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">

              </div>
            </li>
            
            
            
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/<?php echo $t['foto'] ?>" style="max-width: 60px">
                <?php
                if($_SESSION['leveluser']=='admin'){
				?>
                <span class="ml-2 d-none d-lg-inline text-white small">Admin</span>
                <?php
				}else if($_SESSION['leveluser']=='notulen'){
				?>
                <span class="ml-2 d-none d-lg-inline text-white small">Notulen</span>
                <?php
				}
			    ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
         <?php
		 
		if(isset($_GET['module'])){
			$module = $_GET['module'];
			if($module=='dashboard'){
				 include "home.php";
			}else
			if($module=='agenda'){
				 include "agenda.php";
			}else
			if($module=='rapat'){
				 include "rapat.php";
			}else
      if($module=='rapatcari'){
         include "rapatcari.php";
      }else
      if($module=='editrapat'){
         include "editrapat.php";
      }else
      if($module=='detailrapat'){
         include "detailrapat.php";
      }else
			if($module=='laporan'){
				 include "laporan.php";
			}else
      if($module=='laporancari'){
         include "laporancari.php";
      }else
      if($module=='detaillaporan'){
         include "detaillaporan.php";
      }else
      if($module=='user'){
         include "user.php";
      }else
      if($module=='profil'){
         include "profil.php";
      }else
			if($module=='ubahadmin'){
				 include "ubahadmin.php";
			}else
			if($module=='tambahnotulen'){
				 include "tambahnotulen.php";
			}else
			if($module=='editnotulen'){
				 include "editnotulen.php";
			}else
			if($module=='hapusnotulen'){
				 include "hapusnotulen.php";
			}else
			if($module=='mulairapat'){
				 include "mulairapat.php";
			}else
			 
			 {
				 echo "Modul tidak ditemukan atau belum tersedia";
			 }
	 }else{
		include "home.php"; 
	 }
	 
		?>
      
        <!---Container Fluid-->
      </div>
      
     
      <!-- Footer -->
      <footer class="sticky-footer bg-purple">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2022
              <b><a href="" target="_blank">Dinas Pariwisata dan Kebudayaan Kota Bogor</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script>
    $(document).ready(function(){
        $('#table').DataTable();
    });
</script> 


  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
</body>

</html>
<?php
}
?>