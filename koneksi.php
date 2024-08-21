<?php
// ini mengkoneksikan database
$host = "localhost";
$username = "root";
$password = "";
$database = "mh_procode";
// ini mengecek database sudah terconnect atau tidak
$k = mysqli_connect($host, $username, $password, $database);
if (!$k) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>