<?php 
include "koneksi.php";
$idrapat = $_GET['id'];
  ?>
<?php            
                $data= mysqli_query($conn,"SELECT * FROM rapat WHERE idrapat='$idrapat'");
                $t=mysqli_fetch_array($data);?>

  

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Absen.doc");
 ?>
 <div class="container-fluid" id="container-wrapper">
    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                
                <div class="card-body">
                  <h3 align="center">Laporan <?php echo $t['judul'] ?></h3>
                  <p><?php echo $t['catatan'] ?></p>
                  
                </div>
            </div>
    </div>    
  </div>      
</div>       

</body>
</html>