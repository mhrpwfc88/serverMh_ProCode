

<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card">

            <div class="card-header">Admin
                <form action=".?hal=uploadFilePrivate" method="POST" enctype="multipart/form-data">
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
                        $sql = "SELECT * FROM files_private ORDER BY id DESC";
                        $result = $k->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['file_name']) ?></td>

                                    <td>
                                        <a class="text-white" href="download_private.php?file_name=<?= htmlspecialchars($row['file_name']) ?>">
                                            <button type="button" class="btn btn-light">
                                                <i class=" fa fa-cloud-download "></i>
                                            </button>
                                        </a>
                                        <button type=" button" class="btn btn-light " onclick="copyToClipboard('<?= "download_private.php?file_name=" . urlencode($row['file_name']) ?>')">
                                            <i class="fa fa-copy"></i>
                                        </button>
                                        <button type="button" class="btn btn-light ">
                                            <a class="text-white" onclick="return confirm('Apakah Anda yakin akan menghapus file ini?')" href=".?hal=deletePrivate&id=<?= $row["id"] ?>"><i class="fa fa-trash-o"></i></a>
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