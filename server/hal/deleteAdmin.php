<?php
$id = $_GET['id'];
$sql = "DELETE FROM tbuser WHERE id_user = '$id'";
$q = mysqli_query($k, $sql);
echo "<script>alert('Data berhasil dihapus');location='.?hal=admin'</script>";
