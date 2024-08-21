<div class="row  mt-3">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="card-title">Server Form</div>
        <hr>
        <form method="post" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label for="input-1">Nama Server</label>
            <input type="text" name="txtnama" placeholder="Masukan Nama server" class="form-control">
          </div>
          <div class="from-group">
            <label for="input-1">status</label>
            <select name="txtstatus" class="form-select" aria-label="Default select example">
              <option class="text-white" selected value="1">Aktif</option>
              <option class="text-white" value="0">off</option>
           
            </select>
          </div>
          <div class="form-group">
            <label for="input-2">Link Server</label>
            <input type="text" name="txtlink" placeholder="Masukan link server kamu" class="form-control">
          </div>
          <div class="form-group">
            <label for="input-3">Link Icon <a target="_blank" href="https://visualpharm.com/">link icon</a></label>
              <input type="text" name="txticon" placeholder="Masukan link Icon" class="form-control">
          </div>
          
          <div class="form-group">
            <button name="simpan" value="Simpan" type="submit" class="btn btn-light px-5">Submit</button>
          </div>
          <?php
                if (@$_POST['simpan']) {
                    $nama = $_POST['txtnama'];
                    $status = $_POST['txtstatus'];
                    $icon = $_POST['txticon'];
                    if ($status === "1"){
                        $valid1 = 1 ;
                    }else{
                        $valid1 = 0 ;
                    };
                    $link = $_POST['txtlink'];
                    mysqli_query($k, "INSERT INTO server (nama_server,link_server, status_server,link_icon)VALUES('$nama','$link',$valid1,'$icon')");
                    echo "<script>alert('Data berhasil disimpan');location='.?hal=server'</script>";
                }
                ?>
        </form>
      </div>
    </div>
  </div>


</div>