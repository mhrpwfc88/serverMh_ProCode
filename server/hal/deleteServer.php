<?php
$id = $_GET['id'];
$sql = "DELETE FROM server WHERE id_server = '$id'";
$q = mysqli_query($k, $sql);
echo "<script>alert('Data berhasil dihapus');location='.?hal=server'</script>";
