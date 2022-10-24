<?php 
include "koneksi.php";
 
$idrapat=$_GET['id'];
  ?>



<form  method="post">

<div class="container-fluid" id="container-wrapper">
    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <p><center><h3><font color="#33FFFF">Ubah Agenda Rapat</font></h3></center></p>
                </div>
                <div class="card-body">
                  <form>
					<?php
                      
                $nomer = 1;
                $data= mysqli_query($conn,"SELECT * FROM rapat WHERE idrapat='$idrapat'");
                while($t=mysqli_fetch_array($data)){?>
					<div class="form-group">
                      <label for="exampleFormControlInput1">Judul Rapat</label>
                      <input class="form-control  mb-3" type="text" name="judul" value="<?php echo $t['judul'] ?>">
                    </div>
					
					<div class="form-group">
                      <label for="exampleFormControlInput1">Tanggal Rapat</label>
                      <input class="form-control  mb-3" type="date" name="tglrapat" value="<?php echo $t['tglrapat'] ?>">
                    </div>

          <div class="form-group">
                      <label for="exampleFormControlInput1">Jam Rapat</label>
                      <input class="form-control  mb-3" type="text" name="jamrapat" value="<?php echo $t['jamrapat'] ?>">
                    </div>          
					
	       <?php } ?>

					
					<div class="form-group">
                      <label for="exampleFormControlInput1">Daftar Anggota</label>
                      <?php
                $dat= mysqli_query($conn,"SELECT * FROM daftar WHERE idrapat='$idrapat'");
                while($g=mysqli_fetch_array($dat)){?>
                      <div class="letak-input">
                        <input type="hidden" name="id[]" value="<?php echo $g['iddaftar'] ?>" >
                        <input class="form-control  mb-3" type="text" name="daftar[]" value="<?php echo $g['namaanggota'] ?>" style="margin-bottom:  10px">
                      </div>
                      <?php } ?>
                    </div>

					
					
					</br>
					
				      <button name="ubah" class="btn btn-primary">Ubah Agenda</button>                 
                  </form>
                </div>
            </div>
		</div>	  
	</div>		  
</div>			 

<?php
if (isset($_POST["ubah"])) 
{
$judul=$_POST['judul'];
$tgl = $_POST['tglrapat'];
$jam = $_POST['jamrapat'];
$nama = $_POST['daftar'];
$id = $_POST['id']; 
$total =count($id);


$conn->query("UPDATE rapat SET judul='$judul', tglrapat='$tgl', jamrapat='$jam' WHERE idrapat='$idrapat'");
for($i=0; $i<$total; $i++) {
  $conn->query("UPDATE daftar SET namaanggota='$nama[$i]' WHERE iddaftar='$id[$i]'");
}


echo "<script>alert('Agenda Diubah')</script>";
echo "<script>location='index.php?module=rapat';</script>";

}

?>
