<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-header">Admin
            <?php
                    $aksess = $_SESSION['user_akses'];
                    if ($aksess != 1) {
                        $hakses = 'hidden';
                    } else {
                        $hakses = '';
                    } ?>
                <form <?= $hakses ?> action=".?hal=uploadFileShare" method="POST" enctype="multipart/form-data">
                        Pilih file untuk diunggah:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload File" name="submit">
                    </form>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">name</th>
                            <th scope="col">Handle</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT * FROM files_share ORDER BY id DESC";
                    $result = $k->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['file_name']) ?></td>

                                    <td>
                                        <button type="button" class="btn btn-light px-5">
                                        <a class="text-white" href="download_share.php?id=<?= $row["id"] ?>"><i class="fa  fa-cloud-download "></i>&nbsp; Download </a>
                                    </button>
                                    
                                        <button type="button" class="btn btn-light px-5">
                                        <a class="text-white" onclick="return confirm('Apakah Anda yakin akan menghapus file ini?')" href=".?hal=deleteShare&id=<?= $row["id"] ?>"><i class="fa fa-trash-o"></i>&nbsp; Delete </a>
                                        </button>

                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="2">Tidak ada file yang diunggah.</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>