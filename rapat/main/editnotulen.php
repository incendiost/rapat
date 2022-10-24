<?php 
include "koneksi.php";
 $id=$_GET['id'];
  ?>



<div class="container-fluid" id="container-wrapper">
    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">

                <div class="card-body">
              <form method="post"  enctype="multipart/form-data">
                <h3>Ubah Admin</h3>
    <div class="form-group">
      <?php $d= mysqli_query($conn,"SELECT * FROM admin WHERE idadmin='$id'");
                $tampil=mysqli_fetch_array($d); ?>
                          <label for="exampleFormControlInput1">Nama</label>
                          <input class="form-control  mb-3" type="text" name="nama" value="<?php echo $tampil['nama'] ?>" >
                        </div>
              
              <div class="form-group">
                          <label for="exampleFormControlInput1">Username</label>
                          <input class="form-control  mb-3" type="text" name="username" value="<?php echo $tampil['username'] ?>"  >
                        </div>

              <div class="form-group">
                          <label for="exampleFormControlInput1">Password</label>
                          <input class="form-control  mb-3" type="password" name="password" value="<?php echo $tampil['password'] ?>" >
                        </div>
              <div class="form-group">
                          <label for="exampleFormControlInput1">Foto</label>
                          <input class="form-control  mb-3" type="file" name="foto" value="<?php echo $tampil['foto'] ?>" >
                        </div>
          <button class= "btn btn-primary" type="submit" name="ubah" >Ubah</button>
        </form>       

                </div>
            </div>
		</div>	  
	</div>		  
</div>			 


<?php
if (isset($_POST["ubah"])) 
{
$nama=$_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$namanamafoto = $_FILES['foto']['name'];
$lokasilokasifoto =$_FILES['foto']['tmp_name'];
move_uploaded_file($lokasilokasifoto, "img/".$namanamafoto);


$conn->query("UPDATE admin SET nama ='$nama', username='$username', password='$password', foto='$namanamafoto' WHERE idadmin='$id'");



echo "<script>alert('Notulen Sudah Ditambah')</script>";

echo "<script>location='index.php?module=user';</script>";

}
?>