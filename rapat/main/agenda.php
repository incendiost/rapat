<?php 
include "koneksi.php";
  ?>



<form  method="post">

<div class="container-fluid" id="container-wrapper">
    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <p><center><h3><font color="#000000"><b>Buat Agenda Rapat</font></h3></center></p></b>
                </div>
                <div class="card-body">
                  <form>
					
					<div class="form-group">
                      <label for="exampleFormControlInput1">Judul Rapat</label>
                      <input class="form-control  mb-3" type="text" name="judul" placeholder="Judul Rapat" required="required">
                    </div>
					
					<div class="form-group">
                      <label for="exampleFormControlInput1">Tanggal Rapat</label>
                      <input class="form-control  mb-3" type="date" name="tglrapat" required="required">
                    </div>

          <div class="form-group">
                      <label for="exampleFormControlInput1">Jam Rapat</label>
                      <input class="form-control  mb-3" type="text" name="jamrapat" placeholder="13:30" required="required">
                    </div>          
					
	
					
					<div class="form-group">
                      <label for="exampleFormControlInput1">Daftar Anggota</label>
                      <div class="letak-input">
                        <input class="form-control  mb-3" type="text" name="daftar[]" placeholder="Tambahkan Anggota Rapat" required="required" style="margin-bottom:  10px">
                      </div>
                      <span class="btn btn-primary btn-tambah">
                      <i class="fa fa-plus"></i>
                      </span>
                    </div>

					
					
					</br>
					
				      <button name="tambah" class="btn btn-primary">Buat Agenda</button>                 
                  </form>
                </div>
            </div>
		</div>	  
	</div>		  
</div>			 


<?php
if (isset($_POST["tambah"])) 
{
$judul=$_POST['judul'];
$tgl = $_POST['tglrapat'];
$jam = $_POST['jamrapat'];
$nama = $_POST['daftar'];
$total =count($nama);


$conn->query("INSERT INTO rapat(judul, tglrapat, jamrapat) VALUES('$judul', '$tgl', '$jam')");
$id_rapat=$conn->insert_id;
for($i=0; $i<$total; $i++) {
  $conn->query("INSERT INTO daftar(idrapat, namaanggota) VALUES('$id_rapat', '$nama[$i]')");
}


echo "<script>alert('Agenda Dibuat')</script>";
echo "<script>location='index.php?module=rapat';</script>";

}

?>
<script>
  $(document).ready(function(){
    $(".btn-tambah").on("click",function(){
      $(".letak-input").append("<input type='text' class='form-control' name='daftar[]' placeholder='Tambahkan Anggota Rapat' style='margin-bottom:10px'>");
    })
  })
</script>