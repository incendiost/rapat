<?php
include "koneksi.php";

?>


        <div class="container-fluid" id="container-wrapper">
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
				
				
				
                <div class="table-responsive p-3" >
				<h3>Profil</h3>
                  <table class="table align-items-center table-flush" id="table" >
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
						<th>Nama Aplikasi</th>
                        <th>Logo Aplikasi</th>
                        <th>Icon Aplikasi</th>
                    </thead>
                    
                    <tbody>
                    	<?php
                      
								$nomer = 1;
								$data= mysqli_query($conn,"SELECT * FROM profil");
								while($t=mysqli_fetch_array($data)){
									
								
									echo'<tr>';
									echo"<td>$nomer</td>";
									echo"<td>$t[nama]</td>";?>
									<td><img src="img/logo/<?php echo $t['logo'] ?>" alt="" class="img-responsive" width="150"></td>
                  <td><img src="img/logo/<?php echo $t['ikon'] ?>" alt="" class="img-responsive" width="150"></td>
									<?php
								
									echo '</tr>';
								$nomer = $nomer +1;
								}
                    ?> 
                    </tbody>
                  </table>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Ubah</button>
                </div>
              </div>
            </div>
            
          </div>
          <!--Row-->

      </div>

    </div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog"><br><br><br><br>
  <div class="modal-dialog">
    <!-- konten modal-->
    <div class="modal-content">
      <!-- heading modal -->
      <div class="modal-header">
        <h2 class="modal-title">Ubah Profil</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- body modal -->
   <?php $dat= mysqli_query($conn,"SELECT * FROM profil");
								$ta=mysqli_fetch_array($dat); ?>
  <div class="container">
    <form method="post" action="ganti.php" enctype="multipart/form-data">
		<div class="form-group">
		                      <label for="exampleFormControlInput1">Nama Aplikasi</label>
		                      <input class="form-control  mb-3" type="text" name="nama" value="<?php echo $ta['nama'] ?>">
		                    </div>
							
		          <div class="form-group">
		                      <label for="exampleFormControlInput1">Logo Aplikasi</label>
		                      <input class="form-control  mb-3" type="file" name="logo" value="<?php echo $ta['logo'] ?>"  required>
		                    </div>
              <div class="form-group">
                          <label for="exampleFormControlInput1">Favicon Aplikasi</label>
                          <input class="form-control  mb-3" type="file" name="ikon" value="<?php echo $ta['ikon'] ?>" required >
                        </div>
		      <button class= "btn btn-primary" type="submit" >Ubah</button>
		    </form>		    

      <!-- footer modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>