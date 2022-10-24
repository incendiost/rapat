<?php
include "koneksi.php";

?>


        <div class="container-fluid" id="container-wrapper">
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">USER</h6>
                  
                    
                </div>
				
				
				
                <div class="table-responsive p-3" >
                <?php
                if($_SESSION['leveluser']=='admin'){
				?>
           		  <h3>Admin</h3>
                  <table class="table align-items-center table-flush" id="table" >
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
						<th>Nama</th>
                        <th>Username</th>
						<th>Password</th>
                        <th>Foto Profil</th>
						<th>Aksi</th>
                    </thead>
                    
                    <tbody>
                    	<?php
                      
								$nomer = 1;
								$data= mysqli_query($conn,"SELECT * FROM admin WHERE level='admin'");
								while($t=mysqli_fetch_array($data)){
									
								
									echo'<tr>';
									echo"<td>$nomer</td>";
									echo"<td>$t[nama]</td>"?>
									<td><?php echo $t['username']?></td>
									<td type="password"><?php echo $t['password']?></td>
									<td><img src="img/<?php echo $t['foto'] ?>" alt="" class="img-responsive" width="150"></td>
									<?php
									echo"<td><a href='index.php?module=ubahadmin&id=$t[idadmin]' class='btn btn-outline-success mb-1'>Edit</a></td>";
								
									echo '</tr>';
								$nomer = $nomer +1;
								}
                    ?> 
                    </tbody>
                  </table>
                  <br>
                  <h3>Notulen</h3>
                  <table class="table align-items-center table-flush" id="table" >
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
						<th>Nama</th>
                        <th>Username</th>
						<th>Password</th>
                        <th>Foto Profil</th>
						<th>Aksi</th>
                    </thead>
                    
                    <tbody>
                    	<?php
                      
								$nomer = 1;
								$data= mysqli_query($conn,"SELECT * FROM admin WHERE level='notulen'");
								while($t=mysqli_fetch_array($data)){
									
								
									echo'<tr>';
									echo"<td>$nomer</td>";
									echo"<td>$t[nama]</td>"?>
									<td><?php echo $t['username']?></td>
									<td type="password"><?php echo $t['password']?></td>
									<td><img src="img/<?php echo $t['foto'] ?>" alt="" class="img-responsive" width="150"></td>
									<?php
									echo"<td><a href='index.php?module=editnotulen&id=$t[idadmin]' class='btn btn-outline-success mb-1'>Edit</a> | <a href='hapusnotulen.php?modul=hapus&id=$t[idadmin]' class='btn btn-outline-success mb-1'>Hapus</a></td>";
								
									echo '</tr>';
								$nomer = $nomer +1;
								}
                    ?> 
                    </tbody>
                  </table>
                  <?php
				}else if($_SESSION['leveluser']=='notulen'){
				?>
				<h3>Notulen</h3>
                  <table class="table align-items-center table-flush" id="table" >
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
						<th>Nama</th>
                        <th>Username</th>
						<th>Password</th>
                        <th>Foto Profil</th>
						<th>Aksi</th>
                    </thead>
                    
                    <tbody>
                    	<?php
                      
								$nomer = 1;
								$data= mysqli_query($conn,"SELECT * FROM admin WHERE level='notulen'");
								while($t=mysqli_fetch_array($data)){
									
								
									echo'<tr>';
									echo"<td>$nomer</td>";
									echo"<td>$t[nama]</td>"?>
									<td><?php echo $t['username']?></td>
									<td type="password"><?php echo $t['password']?></td>
									<td><img src="img/<?php echo $t['foto'] ?>" alt="" class="img-responsive" width="150"></td>
									<?php
									echo"<td><a href='index.php?module=editnotulen&id=$t[idadmin]' class='btn btn-outline-success mb-1'>Edit</a> | <a href='hapusnotulen.php?modul=hapus&id=$t[idadmin]' class='btn btn-outline-success mb-1'>Hapus</a></td>";
								
									echo '</tr>';
								$nomer = $nomer +1;
								}
                    ?> 
                    </tbody>
                  </table>
              <?php } ?>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Tambah Notulen</button>
                </div>
              </div>
            </div>
            
          </div>
          <!--Row-->

      </div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog"><br><br><br><br>
  <div class="modal-dialog">
    <!-- konten modal-->
    <div class="modal-content">
      <!-- heading modal -->
      <div class="modal-header">
        <h2 class="modal-title">Tambah Notulen</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- body modal -->
   
  <div class="container">
    <form method="post" action="tambahnotulen.php" enctype="multipart/form-data">
		<div class="form-group">
		                      <label for="exampleFormControlInput1">Nama</label>
		                      <input class="form-control  mb-3" type="text" name="nama" placeholder="Isikan Nama Anda" required="required">
		                    </div>
							
							<div class="form-group">
		                      <label for="exampleFormControlInput1">Username</label>
		                      <input class="form-control  mb-3" type="text" name="username" required="required">
		                    </div>

		          <div class="form-group">
		                      <label for="exampleFormControlInput1">Password</label>
		                      <input class="form-control  mb-3" type="password" name="password"required="required">
		                    </div>
		          <div class="form-group">
		                      <label for="exampleFormControlInput1">Foto</label>
		                      <input class="form-control  mb-3" type="file" name="foto" required="required">
		                    </div>
		                    <input type="hidden" name="level" value="notulen">
		      <button class= "btn btn-primary" type="submit" >Tambah</button>
		    </form>		    

      <!-- footer modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
