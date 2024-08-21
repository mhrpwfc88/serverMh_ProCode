<?php
$id = $_GET['id'];
$sql = "SELECT * FROM server WHERE id_server = '$id'";
$q = mysqli_query($k, $sql);
$r = mysqli_fetch_assoc($q);
?>

<div class="row  mt-3">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="card-title">Server Form</div>
        <hr>
        <form method="post" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label for="input-1">Nama Server</label>
            <input type="text" name="txtnama" value="<?= $r['nama_server'] ?>" placeholder="Masukan Nama server" class="form-control">
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
            <input type="text" value="<?= $r['link_server'] ?>" name="txtlink" placeholder="Masukan link server kamu" class="form-control">
          </div>
          <div class="form-group">
            <label for="input-3">Link Icon <a target="_blank" href="https://visualpharm.com/">link icon</a></label>
              <input type="text" value="<?= $r['link_icon'] ?>" name="txticon" placeholder="Masukan link Icon" class="form-control">
          </div>
          
          <div class="form-group">
            <button name="simpan" value="Simpan" type="submit" class="btn btn-light px-5">Submit</button>
          </div>
          <?php
                if (@$_POST['simpan']) {
                    $nama = $_POST['txtnama'];
                    $status = $_POST['txtstatus'];
                    $icon = $_POST['txticon'];
                    if ($status === "1") {
                        $valid1 = 1;
                    } else {
                        $valid1 = 0;
                    };
                    $link = $_POST['txtlink'];
                    mysqli_query($k, "UPDATE server SET nama_server ='$nama', status_server =$valid1, link_icon = '$icon', link_server = '$link' WHERE id_server = '$id' ");
                    echo "<script>alert('Data berhasil di Update');location='.?hal=server'</script>";
                }
                ?>
        </form>
      </div>
    </div>
  </div>


</div>