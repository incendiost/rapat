<?php 
include "koneksi.php";
$idrapat = $_GET['id'];
$conn->query("UPDATE rapat SET status='Berlangsung' WHERE idrapat='$idrapat'");
  ?>



<form  method="post">

<div class="container-fluid" id="container-wrapper">
    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <p><center><h3><font color="#33FFFF">Rapat Berlangsung</font></h3></center></p>
                </div>
                <div class="card-body">
                  <form>
					 <?php
                    
                $data= mysqli_query($conn,"SELECT * FROM rapat WHERE idrapat='$idrapat'");
                $t=mysqli_fetch_array($data);?>
					<div class="form-group">
                      <label for="exampleFormControlInput1">Judul Rapat</label>
                      <input class="form-control  mb-3" readonly="" value="<?php echo $t['judul'] ?>">
                    </div>
          <div class="form-group">
                      <label for="exampleFormControlInput1">Tanggal Rapat</label>
                      <input class="form-control  mb-3" readonly="" value="<?php echo $t['tglrapat'] ?>">
                    </div>          
					
					<div class="form-group">
                      <label>Catatan Rapat</label>
                      
                        <textarea class="form-control" name="catatan" id="deskripsi" required="required" rows="10"><?php echo $t['catatan'] ?></textarea>
                        <script>
                                    CKEDITOR.replace( 'deskripsi' );
                        </script>
                      
                    </div>
					         </br>
				            <button name="tambah" class="btn btn-primary" onclick="return confirm('Apa Anda Ingin Mengakhiri Rapat Ini ?')" >Rapat Selesai</button>                 
                  </form>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Daftar Hadir</button>

                </div>
            </div>
		</div>	  
	</div>		  
</div>			 

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog"><br><br><br><br>
  <div class="modal-dialog">
    <!-- konten modal-->
    <div class="modal-content">
      <!-- heading modal -->
      <div class="modal-header">
        <h2 class="modal-title">Daftar Hadir</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- body modal -->
   
  <div class="container">
    <form method="post">
      <table class="table table-bordered" >
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Status</th>
          </tr>
          <?php
          $nomer = 1;
                $dat= mysqli_query($conn,"SELECT * FROM daftar WHERE idrapat='$idrapat'");
                while($ta=mysqli_fetch_array($dat)){?>
               <input type="hidden" name="id[]" value="<?php echo $ta['iddaftar'] ?>">   
          <tr>
            <td><?php echo $nomer ?></td>
            <td><?php echo $ta['namaanggota'] ?></td>
            <td>
              <select name="status[]" required="required">
                <option><?php echo $ta['status'] ?></option>
                <option value="Izin">Izin</option>
                <option value="Hadir">Hadir</option>
                <option value="Kosong">Kosong</option>
              </select>
            </td>
          </tr>
          <?php $nomer++;?>
          <?php } ?>
        </thead>
      </table>
              
      <button class= "btn btn-primary" name="daftar" type="submit" >Absen</button>
    </form>
  </div>
    

      <!-- footer modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($_POST["tambah"])) 
{
$catatan=$_POST['catatan'];


$conn->query("UPDATE rapat SET catatan='$catatan', status='Selesai' WHERE idrapat='$idrapat'");

echo "<script>alert('Rapat Selesai')</script>";
echo "<script>location='index.php?module=laporan';</script>";
}

?>
<?php 
if (isset($_POST["daftar"])) 
{
$status=$_POST['status'];
$id = $_POST['id']; 
$total =count($id);

for($i=0; $i<$total; $i++) {
  $conn->query("UPDATE daftar SET status='$status[$i]' WHERE iddaftar='$id[$i]'");
}


echo "<script>alert('Absensi Sudah Di Isi')</script>";
echo "<script>location='index.php?module=mulairapat&id=$idrapat';</script>";
}
 ?>