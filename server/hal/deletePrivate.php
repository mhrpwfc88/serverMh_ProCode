<?php
if (isset($_GET['id'])) {
    $fileId = $_GET['id'];
    
    // Lakukan koneksi ke database (sesuaikan dengan konfigurasi koneksi Anda)
    // Periksa koneksi
    if ($k->connect_error) {
        die("Koneksi gagal: " . $k->connect_error);
    }
    
    // Persiapkan pernyataan SQL untuk menghapus file
    $sql = "DELETE FROM files_private WHERE id = ?";
    $stmt = $k->prepare($sql);
    $stmt->bind_param("i", $fileId);
    
    // Jalankan pernyataan SQL
    if ($stmt->execute()) {
        // Jika berhasil dihapus, arahkan kembali ke halaman utama dengan pesan
        echo "<script>alert('File berhasil dihapus'); window.location.href = '.?hal=private_file';</script>";
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal menghapus file: " . $stmt->error;
    }

    // Tutup statement dan koneksi database
    $stmt->close();
    $k->close();
} else {
    echo "ID file tidak diberikan.";
}
?>

