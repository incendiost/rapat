<?php
include "koneksi.php";

          $jumlah_peserta = mysqli_query($conn,"select * from daftar");
          $jumlahpeserta= mysqli_num_rows($jumlah_peserta);
           $jumlah_agenda = mysqli_query($conn,"select * from rapat");
          $jumlahagenda= mysqli_num_rows($jumlah_agenda);
          $jumlahrapatsegera = mysqli_query($conn,"select * from rapat where status='Segera'");
          $jumlahrapatsegera1= mysqli_num_rows($jumlahrapatsegera);
          $jumlahrapatselesai = mysqli_query($conn,"select * from rapat where status='Selesai'");
          $jumlahrapatselesai1= mysqli_num_rows($jumlahrapatselesai);


?>
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
  <h3 align="center"><b>Grafik Kehadiran Peserta Rapat</h3></b>
<div class="container-fluid" id="container-wrapper">
	<div class="row">
		<div class="col-lg-12">

<div class="row mb-3">
    <div style="width: 100%; max-width: 900px; margin: 0px auto;">
    <canvas id="myChart"></canvas>
  </div>
            
          </div>

		</div>
	</div>			  
</div>
<br><br>
<div class="container-fluid" id="container-wrapper">
	<div class="row">
		<div class="col-lg-12">

<div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">JUMLAH PESERTA RAPAT</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahpeserta ?> Peserta</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span>Since Jan 2020</span>
                      </div>
                    </div>
                    <div class="col-auto " >
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">JUMLAH AGENDA RAPAT</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahagenda ?> Rapat</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span>Since Jan 2020</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">JUMLAH RAPAT SEGERA</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jumlahrapatsegera1 ?> Rapat</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span>Since Jan 2020</span>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clock fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">JUMLAH RAPAT SELESAI</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahrapatselesai1 ?> Rapat</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span>Since Jan 2020</span>
                    
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-flag-checkered fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
          </div>

		</div>
	</div>			  
</div>		
  <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Hadir", "Kosong",  "izin"],
        datasets: [{
          label: '',
          data: [
          <?php 
          $jumlah_teknik = mysqli_query($conn,"select * from daftar where status='Hadir'");
          echo mysqli_num_rows($jumlah_teknik);
          ?>, 
          <?php 
          $jumlah_ekonomi = mysqli_query($conn,"select * from daftar where status='Kosong'");
          echo mysqli_num_rows($jumlah_ekonomi);
          ?>,  
          <?php 
          $jumlah_pertanian = mysqli_query($conn,"select * from daftar where status='Izin'");
          echo mysqli_num_rows($jumlah_pertanian);
          ?>
          ],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>