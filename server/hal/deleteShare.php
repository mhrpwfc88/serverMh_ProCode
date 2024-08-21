<?php
if (isset($_GET['id'])) {
    $fileId = $_GET['id'];
    

    if ($k->connect_error) {
        die("Koneksi gagal: " . $k->connect_error);
    }
    
  
    $sql = "DELETE FROM files_share WHERE id = ?";
    $stmt = $k->prepare($sql);
    $stmt->bind_param("i", $fileId);
    
    if ($stmt->execute()) {
      
        echo "<script>alert('File berhasil dihapus'); window.location.href = '.?hal=beranda';</script>";
        exit();
    } else {
       
        echo "Gagal menghapus file: " . $stmt->error;
    }

    
    $stmt->close();
    $k->close();
} else {
    echo "ID file tidak diberikan.";
}
?>

