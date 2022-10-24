<?php 
include "koneksi.php";
$idrapat = $_GET['id'];
?>





<div class="container-fluid" id="container-wrapper">
    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <p><center><h3><font color="#ff3333"><b>Detail Rapat</font></h3></center></p></b>
                </div>
                <div class="card-body">
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
                      <label for="exampleFormControlInput1">Jam</label>
                      <input class="form-control  mb-3" readonly="" value="<?php echo $t['jamrapat'] ?>">
                    </div>          
					
					<div class="form-group">
                      <label>Catatan Rapat</label>
                      
                        <textarea class="form-control" id="deskripsi" rows="10" readonly=""><?php echo $t['catatan'] ?></textarea>
                 <script>
                                    CKEDITOR.replace( 'deskripsi' );
                        </script>
                    </div>
                    <h3>Daftar Hadir Rapat</h3>
                    <table class="table table-bordered">
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
                    </table><br>
                    <a href="daftarhadir.php?id=<?php echo $t['idrapat'] ?>" class="btn btn-outline-danger mb-1">Unduh Daftar Hadir</a>
                </div>
            </div>
		</div>	  
	</div>		  
</div>			 

