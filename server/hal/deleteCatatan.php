<?php
$id = $_GET['id'];
$sql = "DELETE FROM catatan WHERE id = '$id'";
$q = mysqli_query($k, $sql);
echo "<script>alert('Data berhasil dihapus');location='.?hal=catatan'</script>";
