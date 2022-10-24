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
                  <h5 class="m-0 font-weight-bold text-primary">HASIL LAPORAN RAPAT</h5>
                  
                    
                </div>
				
				
				
                <div class="table-responsive p-3" >
                	<form  action="index.php?module=laporancari" method="post">
                  	<div >
                  		<input type="text" name="cari" placeholder="Cari">
                  		  	<button type="submit" class="btn btn-sm btn-danger" name="caridata">Cari </button>
                  	</div>
                
                  </form>
                  <table class="table align-items-center table-flush" id="table" >
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
						<th>Judul Rapat</th>
                        <th>Tanggal</th>
                        <th>Status</th>
						<th>Aksi</th>
                    </thead>
                    
                    <tbody>
                    	<?php
                      
								$nomer = 1;
								$data= mysqli_query($conn,"SELECT * FROM rapat WHERE status = 'Selesai' ORDER BY tglrapat ASC");
								while($t=mysqli_fetch_array($data)){
									
								
									echo'<tr>';
									echo"<td>$nomer</td>";
									echo"<td>$t[judul]</td>"?>
									<td><?php echo date("l, d F Y ", strtotime($t['tglrapat']))?></td>
									<?php
									echo"<td style='color:red'><strong>Selesai</strong></td>";
									?>
                  <td><a href="index.php?module=detaillaporan&id=<?php echo $t['idrapat'] ?>" class="btn btn-outline-success mb-1">Detail</a> | <a href="hapuslaporan.php?modul=hapus&id=<?php echo $t['idrapat'] ?>" class="btn btn-outline-danger mb-1" onclick="return confirm('Apa Anda Ingin Menghapus Ini?')">Hapus</a> | <a href="unduh.php?id=<?php echo $t['idrapat'] ?>" class="btn btn-outline-warning mb-1">Unduh</a></td>
								<?php
									echo '</tr>';
								$nomer = $nomer +1;
								}
                    ?> 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
          <!--Row-->

      </div>
