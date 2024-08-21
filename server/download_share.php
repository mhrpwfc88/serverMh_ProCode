<?php
include "../koneksi.php";
if (isset($_GET['file_name'])) {
    $fileName = $_GET['file_name'];

    // Mengambil informasi file dari database
    $stmt = $k->prepare("SELECT file_name, file_type, file_data FROM files_share WHERE file_name = ?");
    $stmt->bind_param("s", $fileName);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($fileName, $fileType, $fileData);
    $stmt->fetch();

    if ($stmt->num_rows > 0) {
        // Mengatur header untuk download file
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
        header('Content-Length: ' . strlen($fileData));
        
        // Membersihkan output buffer
        ob_clean();
        flush();

        // Mengirimkan data file ke browser
        echo $fileData;
        exit;
    } else {
        echo "File tidak ditemukan.";
    }

    $stmt->close();
} else {
    echo "ID file tidak diberikan.";
}

$k->close(); // Tutup koneksi ke database jika menggunakan objek $k
?>
