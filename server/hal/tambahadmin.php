<div class="row  mt-3">
      <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Admin Form</div>
           <hr>
           <form method="post" action="" enctype="multipart/form-data"> 
           <div class="form-group">
            <label for="input-1">Nama</label>
            <input type="text" name="txtnama" placeholder="Masukan Nama kamu" class="form-control">
           </div>
           <div class="from-group">
           <label for="input-1">Level</label>
                    <select name="txtakses" class="form-select" aria-label="Default select example">
                        <option class="text-white" selected value="0">User</option>
                        <option class="text-white" value="1">Admin</option>
                    </select>
           </div>
           <div class="form-group">
            <label for="input-2">Telepon</label>
            <input type="number" name="txttelepon" placeholder="Masukan nomor telepon kamu" class="form-control">
           </div>
           <div class="form-group">
            <label for="input-3">Alamat</label>
            <input type="text" name="txtalamat" placeholder="Masukan alamat kamu" class="form-control">
           </div>
           <div class="form-group">
            <label for="input-4">Username</label>
            <input type="text" name="txtusername" placeholder="username" class="form-control">
           </div>
           <div class="form-group">
            <label for="input-5">password</label>
            <input type="text" name="txtpassword" placeholder="password" class="form-control">
           </div>
           <div class="form-group">
            <label for="input-5">email</label>
            <input type="text" name="txtemail" placeholder="email" class="form-control">
           </div>
           <div class="form-group">
            <button name="simpan" value="Simpan" type="submit" class="btn btn-light px-5">Submit</button>
          </div>
          <?php
                if (@$_POST['simpan']) {
                    $nama = $_POST['txtnama'];
                    $akses = $_POST['txtakses'];
                    $telepon = $_POST['txttelepon'];
                    $alamat = $_POST['txtalamat'];
                    $username = $_POST['txtusername'];
                    $password = password_hash($_POST['txtpassword'], PASSWORD_DEFAULT); 
                    $email = $_POST['txtemail'];
                    mysqli_query($k, "INSERT INTO tbuser (nama_user, akses, telepon, alamat, username,password, email)VALUES('$nama',$akses,'$telepon','$alamat','$username','$password','$email')");
                    echo "<script>alert('Data berhasil disimpan');location='.?hal=admin'</script>";
                }
                ?>
          </form>
         </div>
         </div>
      </div>

    
    </div>