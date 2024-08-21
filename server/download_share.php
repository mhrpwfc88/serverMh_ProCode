<?php
include "../koneksi.php";
if (isset($_GET['file_name'])) {
    $fileName = $_GET['file_name'];

    $stmt = $k->prepare("SELECT file_name, file_type, file_data FROM files_share WHERE file_name = ?");
    $stmt->bind_param("s", $fileName);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($fileName, $fileType, $fileData);
    $stmt->fetch();

    if ($stmt->num_rows > 0) {
       
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
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
    echo "ID file tidak diberikan.";
}

$k->close(); 
?>
