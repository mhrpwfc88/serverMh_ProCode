<?php
$id = $_GET['id'];
$sql = "UPDATE list_target SET status_target = 1 WHERE id_target = '$id' ";
$q = mysqli_query($k, $sql);
echo "<script>location='.?hal=list'</script>";