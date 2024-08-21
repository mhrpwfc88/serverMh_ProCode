<?php
$aksess = $_SESSION['user_akses'];
if ($aksess != 1) {
    $hakses = 'hidden';
} else {
    $hakses = '';
}

?>
<?php

// AKTIFKAN JIKA INGIN MENGGUNAKAN FITUR MONITORING



// $config = include('../apicpl.php');

// $api_token = $config['api_token'];
// $cpanel_host = $config['cpanel_host'];
// $username = $config['username'];

// $headers = [
//     'Authorization: cpanel ' . $username . ':' . $api_token,
//     'Content-Type: application/json'
// ];


// function getDiskUsage($cpanel_host, $headers)
// {
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $cpanel_host . "/execute/Quota/get_quota_info");
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

//     $response = curl_exec($ch);
//     curl_close($ch);

//     $data = json_decode($response, true);
//     return [
//         'disk_used' => isset($data['data']['megabytes_used']) ? $data['data']['megabytes_used'] : 'N/A',
//         'disk_limit' => isset($data['data']['megabyte_limit']) ? $data['data']['megabyte_limit'] : 'N/A'
//     ];
// }


// function getDatabaseUsage($cpanel_host, $headers)
// {
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $cpanel_host . "/execute/Mysql/list_databases");
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

//     $response = curl_exec($ch);
//     curl_close($ch);

//     $data = json_decode($response, true);

//     $total_db_usage = 0;
//     if (isset($data['data'])) {
//         foreach ($data['data'] as $db) {
//             $total_db_usage += isset($db['disk_usage']) ? ($db['disk_usage'] / 1048576) : 0;
//         }
//     }
//     return $total_db_usage;
// }

// $disk_usage = getDiskUsage($cpanel_host, $headers);
// $db_usage = getDatabaseUsage($cpanel_host, $headers);

// $disk_used = $disk_usage['disk_used'];
// $disk_limit = $disk_usage['disk_limit'];
// $db_used = $db_usage;


// $disk_percentage = ($disk_limit != 'N/A' && $disk_limit > 0) ? ($disk_used / $disk_limit) * 100 : 'N/A';


// $db_limit = 'N/A'; 
// $db_percentage = ($db_limit != 'N/A' && $db_limit > 0) ? ($db_used / $db_limit) * 100 : 'N/A';

// $total_used = $disk_used + $db_used;
// $total_limit = ($disk_limit != 'N/A' && $db_limit != 'N/A') ? ($disk_limit + $db_limit) : 'N/A';
// $total_percentage = ($total_limit != 'N/A' && $total_limit > 0) ? ($total_used / $total_limit) * 100 : 'N/A';


?>

<!-- AKTIFKAN JIKA INGIN MENGGUNAKAN FITUR MONITORING CPANEL -->

<!-- <div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <?php
                    $query = "SELECT COUNT(file_name) as total_share_file FROM files_share WHERE file_name IS NOT NULL";
                    $result = mysqli_query($k, $query);
                    $row = mysqli_fetch_assoc($result);
                    $total_share = $row['total_share_file'];
                    ?>
                    <h5 class="text-white mb-0"><?= $total_share ?> <span class="float-right"><i class="fa "></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:100%"></div>
                    </div>
                    <p class="mb-0 text-white small-font">File Share <span class="float-right"></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class="text-white mb-0"> ∞<span class="float-right"><i class="fa "></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:100%"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Bandwidth <span class="float-right">∞</span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class="text-white mb-0"><?php echo number_format($db_used, 2); ?> MB <span class="float-right"><i class="fa "></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:100%"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Storage Databases <span class="float-right">∞<i class="zmdi "></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class="text-white mb-0"><?php echo $disk_used; ?> MB <span class="float-right"><i class="fa "></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:<?php echo is_numeric($disk_percentage) ? number_format($disk_percentage, 2) : $disk_percentage; ?>%"></div>
                    </div>
                    <p class="mb-0 text-white small-font">Storage Server<span class="float-right">5Gb </span></p>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-header">File Share
                <?php
                $sql = "SELECT akses FROM user_access WHERE id = 1"; // Ganti dengan id yang sesuai
                $result = $k->query($sql);
                // Mengecek hasil query
                if ($result->num_rows > 0) {
                    // Mengambil nilai akses dari hasil query
                    $row = $result->fetch_assoc();
                    $access = $row['akses'];
                } else {
                    echo "Tidak ada data ditemukan.";
                    $access = 0; // Nilai default jika tidak ada data ditemukan
                }
                // Logika untuk menentukan kelas CSS
                if ($access == 1) {
                    $hiddenClass = "";
                } else {
                    $hiddenClass = "hidden";
                }
                ?>

                <form <?= $hiddenClass ?> action=".?hal=uploadFileShare" method="POST" enctype="multipart/form-data">
                    Pilih file untuk diunggah:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload File" name="submit">
                </form>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush table-borderless">
                    <thead>
                        <tr>
                            <th>Download</th>
                            <th>Name File</th>

                        </tr>
                    </thead>
                    <tbody><?php
                            $sql = "SELECT * FROM files_share ORDER BY id DESC";
                            $result = $k->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><a class="text-white" href="download_share.php?file_name=<?= htmlspecialchars($row['file_name']) ?>">
                                            <button type="button" class="btn btn-light">
                                                <i class="fa  fa-cloud-download "></i>
                                            </button>
                                        </a>
                                        <button type=" button" class="btn btn-light " onclick="copyToClipboard('<?= "download_share.php?file_name=" . urlencode($row['file_name']) ?>')">
                                            <i class="fa fa-copy"></i>
                                        </button>
                                        <a <?= $hiddenClass ?> class="text-white" onclick="return confirm('Apakah Anda yakin akan menghapus file ini?')" href=".?hal=deleteShare&id=<?= $row["id"] ?>">
                                            <button type="button" class="btn btn-light">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </a>

                                    </td>
                                    <td><textarea class="non-editable-textarea text-white" readonly oninput="autoResize(this)"><?= htmlspecialchars($row['file_name']) ?></textarea></td>
                                    <td>



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
</div><!--End Row-->
<div <?= $hakses ?> class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title box-title">List Tugas</h4>
            <div class="card-content">
                <div class="todo-list">
                    <div class="tdl-holder">
                        <div class="tdl-content">
                            <ul>
                                <?php
                                $sql = "Select * from list_target";
                                $q = mysqli_query($k, $sql);
                                $no = 1;

                                while ($r = mysqli_fetch_assoc($q)) {
                                    if ($r['status_target']  == 1) {
                                        $status = "checked";
                                    } else {
                                        $status = "";
                                    };

                                ?>
                                    <li>
                                        <label>
                                            <input type="checkbox" <?= $status ?>><i class="check-box"></i><span class="ml-4"><?= $r['nama_target'] ?></span>
                                        </label>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.todo-list -->
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>