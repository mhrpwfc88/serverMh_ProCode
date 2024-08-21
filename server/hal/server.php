<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-header">Admin
                <a class="btn ml-3 btn-light" href=".?hal=tambahserver">Tambah Data</a>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">Aktif</th>
                            <th scope="col">Handle</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "Select * from server";
                        $q = mysqli_query($k, $sql);
                        $no = 1;
                        while ($r = mysqli_fetch_assoc($q)) {
                            if ($r['status_server']  == 1) {
                                $status = "Aktif";
                            } else {
                                $status = "Non-Aktif";
                            };
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $r['nama_server'] ?></td>
                                <td><?= $status ?></td>

                                <td>
                                    <button type="button" class="btn btn-light px-5">
                                    <a class="text-white" href=".?hal=edit-server&id=<?= $r['id_server'] ?>"><i class="fa fa-magic "></i>&nbsp; Edit </a>
                                    </button>
                                    <button type="button" class="btn btn-light px-5">
                                    <a class="text-white"  onclick="return confirm('Apakah anda yakin akan menghapus ?')" href=".?hal=deleteServer&id=<?= $r['id_server'] ?>"><i class="fa fa-trash-o"></i> delete</a>
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