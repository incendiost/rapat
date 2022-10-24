<?php
echo'

<form action="aksitambahuser.php" method="post">

<div class="container-fluid" id="container-wrapper">
    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <p><center><h3><font color="#33FFFF">Formulir Tambah User</font></h3></center></p>
                </div>
                <div class="card-body">
                  <form>
					
					<div class="form-group">
                      <label for="exampleFormControlInput1">Username</label>
                      <input class="form-control  mb-3" type="text" name="a" placeholder="Username yang akan ditambahkan">
                    </div>
					
					<div class="form-group">
                      <label for="exampleFormControlInput1">Password</label>
                      <input class="form-control  mb-3" type="text" name="b" placeholder="Password yang akan digunakan">
                    </div>
					
					<div class="form-group">
                      <label for="exampleFormControlInput1">Nama Lengkap</label>
                      <input class="form-control  mb-3" type="text" name="c" placeholder="Nama lengkap yang akan ditambahkan">
                    </div>
					
					<div class="form-group">
                      <label for="exampleFormControlInput1">Email</label>
                      <input class="form-control  mb-3" type="text" name="d" placeholder="Email yang akan ditambahkan">
                    </div>
					
					<div class="row">
                        <legend class="col-form-label col-sm-1 pt-0">Level</legend>
                        <div class="col-sm-9">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="e" class="custom-control-input" value="admin">
                            <label class="custom-control-label" for="customRadio1">Admin</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="e" class="custom-control-input" value="user">
                            <label class="custom-control-label" for="customRadio2">User</label>
                          </div>
                        </div>
                    </div>
					</br>
					<div class="row">
                        <legend class="col-form-label col-sm-1 pt-0">Blokir</legend>
                        <div class="col-sm-9">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio5" name="f" class="custom-control-input" value="Y">
                            <label class="custom-control-label" for="customRadio5">Y</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio6" name="f" class="custom-control-input" value="N">
                            <label class="custom-control-label" for="customRadio6">N</label></br>
                          </div>
                        </div>
                    </div>
					</br>
				      <button type="submit" class="btn btn-primary">Add User</button>                 
                  </form>
                </div>
            </div>
		</div>	  
	</div>		  
</div>			 

';
?>