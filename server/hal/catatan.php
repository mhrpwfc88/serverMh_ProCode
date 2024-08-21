<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-header">List_Catatan
            <a class="btn ml-3 btn-light" href=".?hal=tambahCatatan">Tambah Data</a>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush table-borderless">
                    <thead>
                        <tr>
                        <th scope="col">Catatan</th>
                        <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "Select * from catatan";
                    $q = mysqli_query($k, $sql);
                    while ($r = mysqli_fetch_assoc($q)) {
                    ?>
                        <tr>
                            <td><textarea class="non-editable-textarea text-white" readonly oninput="autoResize(this)"><?= $r['catatan'] ?></textarea></td>
                            <td>
                                    <button type="button" class="btn btn-light px-5">
                                    <a class="text-white" onclick="return confirm('Apakah anda yakin akan menghapus ?')" href=".?hal=deleteCatatan&id=<?= $r['id'] ?>"><i class="fa fa-trash-o"></i> delete</a>
                                    </button>
                                </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>