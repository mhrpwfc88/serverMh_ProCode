<div class=" container-fluid py-5 px-5">
    <div class="card">
        <div class="card-header"><strong>Note Book</strong><small> Form</small></div>
        <div class="card-body card-block">
            <form method="post" action="" enctype="multipart/form-data"> 
                <div class="form-group"><label for="company" class=" form-control-label">Note Book</label>
                <textarea name="txtnama" id="textarea-input" rows="9" placeholder=" Catatan" class="form-control"></textarea>
                <div class="form-actions form-group"><button name="simpan" value="Simpan" type="submit" class="btn btn-light mt-2">Submit</button></div>
                <?php
                if (@$_POST['simpan']) {
                    $catatan = $_POST['txtnama'];
                    mysqli_query($k, "INSERT INTO catatan (catatan)VALUES('$catatan')");
                    echo "<script>alert('Data berhasil disimpan');location='.?hal=catatan'</script>";
                }
                ?>
            </form>
        </div>
    </div>
</div>