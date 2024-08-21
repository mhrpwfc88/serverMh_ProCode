<?php
include "../koneksi.php";
if (isset($_GET['file_name'])) {
    $fileName = $_GET['file_name'];

    $stmt = $k->prepare("SELECT file_name, file_type, file_data FROM files_private WHERE file_name = ?");
    $stmt->bind_param("s", $fileName);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($retrievedFileName, $fileType, $fileData);
    $stmt->fetch();

    if ($stmt->num_rows > 0) {
    
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($retrievedFileName) . '"');
        header('Content-Length: ' . strlen($fileData));
   
        ob_clean();
        flush();

        echo $fileData;
        exit;
    } else {
        echo "File tidak ditemukan.";
    }

    $stmt->close();
} else {
    echo "Nama file tidak diberikan.";
}

$k->close(); 
?>
