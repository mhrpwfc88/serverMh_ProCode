<?php
$id = $_GET['id'];
$sql = "DELETE FROM list_target WHERE id_target = '$id'";
$q = mysqli_query($k, $sql);
echo "<script>alert('Data berhasil dihapus');location='.?hal=list'</script>";
