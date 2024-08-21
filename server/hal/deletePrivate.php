<?php
if (isset($_GET['id'])) {
    $fileId = $_GET['id'];
 
    if ($k->connect_error) {
        die("Koneksi gagal: " . $k->connect_error);
    }
    
   
    $sql = "DELETE FROM files_private WHERE id = ?";
    $stmt = $k->prepare($sql);
    $stmt->bind_param("i", $fileId);
    
  
    if ($stmt->execute()) {
      
        echo "<script>alert('File berhasil dihapus'); window.location.href = '.?hal=private_file';</script>";
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

