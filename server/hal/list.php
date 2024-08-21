<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-header">List_Target
                <a class="btn ml-3 btn-light" href=".?hal=tambahtarget">Tambah Data</a>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">nama</th>
                            <th scope="col">Status</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "Select * from list_target";
                        $q = mysqli_query($k, $sql);
                        $no = 1;

                        while ($r = mysqli_fetch_assoc($q)) {
                            if ($r['status_target']  == 1) {
                                $status = "selesai";
                            } else {
                                $status = "belum";
                            };

                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><textarea class="non-editable-textarea text-white" readonly oninput="autoResize(this)"><?= $r['nama_target'] ?></textarea></td>
                          
                                <td><?= $status ?></td>
                                <td>
                                    <button type="button" class="btn btn-light">
                                    <a class="text-white"onclick="return confirm('Apakah anda yakin akan menyelesaikan Target ?')" href=".?hal=selesaiTarget&id=<?= $r['id_target'] ?>"><i class="fa fa-magic "></i>&nbsp; Selesai </a>
                                    </button>
                                    <button type="button" class="btn btn-light">
                                    <a class="text-white" onclick="return confirm('Apakah anda yakin akan menghapus ?')" href=".?hal=deleteTarget&id=<?= $r['id_target'] ?>"><i class="fa fa-trash-o"></i></a>
                                    </button>
                                </td>
                            </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>