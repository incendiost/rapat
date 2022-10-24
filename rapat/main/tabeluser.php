<?php
include "koneksi.php";
?>

<?php
echo'
        <div class="container-fluid" id="container-wrapper">
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">TABEL DATA USER</h6>
				  ';?>
                	<a href="index.php?module=nambah_user" class="btn btn-sm btn-primary">Tambah Data User</a>
                    <?php
				echo'  
                </div>
				
				
				
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Username</th>
						<th>Password</th>
                        <th>Nama Lengkap</th>
						<th>Email</th>
						<th>Level</th>
                        <th>Blokir</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    
                    <tbody>';
                      
								$nomer = 1;
								$data= mysqli_query($conn,"SELECT * FROM login");
								
								while($t=mysqli_fetch_array($data)){
									echo'<tr>';
									echo"<td>$nomer</td>";
									echo"<td>$t[username]</td>";
									echo"<td>$t[password]</td>";
									echo"<td>$t[nama_lengkap]</td>";
									echo"<td>$t[email]</td>";
									echo"<td>$t[level]</td>";
									echo"<td>$t[blokir]</td>";
									echo"<td><a href='aksihapususer.php?modul=hapus&id=$t[no_identitas]' class='btn btn-outline-danger mb-1'>Hapus</a> | <a href='index.php?module=edituser&id=$t[no_identitas]' class='btn btn-outline-warning mb-1'>Edit</a></td>";
									echo '</tr>';
								$nomer = $nomer +1;
								}
                    echo'  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
          <!--Row-->

      </div>
';
?>