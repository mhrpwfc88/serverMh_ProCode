<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-header">Admin
                <a class="btn ml-3 btn-light" href=".?hal=tambahadmin">Tambah Data</a>
                <?php
     
                $id = 1; 
                $sql = "SELECT akses FROM user_access WHERE id = $id";
                $result = $k->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $current_access = $row['akses'];
                } else {
                    echo "Data tidak ditemukan.";
                    $current_access = 0;
                }
                ?>
                <form method="post" action=".?hal=process_edit_access">
                    <label>
                        <input type="checkbox" name="akses" <?php echo $current_access ? 'checked' : ''; ?>>
                        Akses untuk User Upload & delete
                    </label>
                    <br>
                    <button class="btn ml-3 btn-light" type="submit">Save</button>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                </form>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush table-borderless">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepom</th>
                            <th>Handle</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "Select * from tbuser";
                        $q = mysqli_query($k, $sql);
                        $no = 1;
                        while ($r = mysqli_fetch_assoc($q)) {
                        ?>
                            <tr>
                                <td><?= $r['nama_user'] ?></td>
                                <td><?= $r['email'] ?></td>
                                <td><?= $r['telepon'] ?></td>

                                <td>
                                    <button type="button" class="btn btn-light px-5">
                                        <a class="text-white" onclick="return confirm('Apakah anda yakin akan menghapus ?')" href=".?hal=deleteAdmin&id=<?= $r['id_user'] ?>"><i class="fa fa-trash-o"></i> delete</a>
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