<?php
include "koneksi.php";

?>


        <div class="container-fluid" id="container-wrapper">
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row center justify-content-between">
                  <h5 class="m-0 font-weight-bold text-primary">JADWAL AGENDA RAPAT</h5>
                  
                    
                </div>
				
				
				
                <div class="table-responsive p-3" >
                	<form  action="index.php?module=rapatcari" method="post">
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
						<th>Jam</th>
                        <th>Status</th>
						<th>Aksi</th>
                    </thead>
                    
                    <tbody>
                    	<?php
                      
								$nomer = 1;
								$data= mysqli_query($conn,"SELECT * FROM rapat WHERE status != 'Selesai' ORDER BY tglrapat ASC");
								while($t=mysqli_fetch_array($data)){
									
								
									echo'<tr>';
									echo"<td>$nomer</td>";
									echo"<td>$t[judul]</td>";
									?><td><?php echo date("l, d F Y ", strtotime($t['tglrapat']))?></td>
									<td><?php echo $t['jamrapat'] ?></td><?php
									if ($t['status']=='Segera') {
										echo"<td><a href='index.php?module=mulairapat&id=$t[idrapat]' class='btn btn-outline-danger mb-1'>Segera</td>";
									 }else{ 
										echo"<td><a href='index.php?module=mulairapat&id=$t[idrapat]' class='btn btn-outline-primary mb-1'><marquee>Berlangsung</marquee></td>";?>
									<?php } ?><?php
									
									$stats=$t['status'];
									if($stats=='Berlangsung'){
										echo"<td><a href='index.php?module=detailrapat&id=$t[idrapat]' class='btn btn-outline-success mb-1'>Detail</a></td>";
									}else{?>
										<td><a href="hapusrapat.php?modul=hapus&id=<?php echo $t['idrapat'] ?>" class="btn btn-outline-danger mb-1" onclick="return confirm('Apa Anda Ingin Menghapus Ini?')">Hapus</a> | <a href="index.php?module=editrapat&id=<?php echo $t['idrapat'] ?>" class="btn btn-outline-warning mb-1">Preview</a></td>
									<?php } 
									echo '</tr>';
								$nomer = $nomer +1;
								}
                    ?> 
                    </tbody>
                  </table>
                  <?php
    if($_SESSION['leveluser']=='admin'){
    
    ?>
                  <a href="index.php?module=agenda" class="btn btn-outline-primary">Tambah Agenda</a>

                  <?php
    }else if($_SESSION['leveluser']=='notulen'){
    ?>
  <?php } ?>
                </div>
              </div>
            </div>
            
          </div>
          <!--Row-->

      </div>
