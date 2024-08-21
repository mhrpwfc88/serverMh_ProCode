<?php
if ($k->connect_error) {
    die("Koneksi gagal: " . $k->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil informasi file
    $fileName = $_FILES['fileToUpload']['name'];
    $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
    $fileType = $_FILES['fileToUpload']['type'];
    $fileData = file_get_contents($fileTmpName);

    // Persiapkan dan jalankan query
    $stmt = $k->prepare("INSERT INTO files_share (file_name, file_type, file_data) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fileName, $fileType, $fileData);
    $stmt->send_long_data(2, $fileData);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil disimpan');location='.?hal=beranda'</script>";
    } else {
        echo "Terjadi kesalahan saat mengunggah file.";
    }

    $stmt->close();
}
