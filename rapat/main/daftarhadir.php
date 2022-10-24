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
                  <h5 align="right"><?php echo date("l, d F Y ", strtotime($t['tglrapat']))?></h5>
                  <h3 align="center">Daftar Hadir Rapat </h3>
                  <h3 align="center"><?php echo $t['judul'] ?></h3><br>
                    <table border="2">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Kehadiran</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $nomer=1;            
                $dat= mysqli_query($conn,"SELECT * FROM daftar WHERE idrapat='$idrapat'");
                while($ta=mysqli_fetch_array($dat)){?>
                        <tr>
                          <td><?php echo $nomer ?></td>
                          <td><?php echo $ta['namaanggota'] ?></td>
                          <td><?php echo $ta['status'] ?></td>
                        </tr>
                        <?php $nomer = $nomer +1; ?>
                      <?php } ?>
                      </tbody>
                    </table>
                  
                </div>
            </div>
    </div>    
  </div>      
</div>       

</body>
</html>