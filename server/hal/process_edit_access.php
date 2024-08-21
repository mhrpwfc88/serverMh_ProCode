<?php
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$new_access = isset($_POST['akses']) ? 1 : 0; // Mengambil nilai akses dari formulir

// Memperbarui nilai akses di database
$update_sql = "UPDATE user_access SET akses = $new_access WHERE id = $id";

if ($k->query($update_sql) === TRUE) {
    echo "Akses berhasil diperbarui.";
} else {
    echo "Error: " . $update_sql . "<br>" . $conn->error;
}
echo "<script>refresh:2;location='.?hal=admin'</script>";
exit();
?>
