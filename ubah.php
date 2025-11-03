<?php
include "koneksi.php";

$id = $_GET['id'];
$status = $_GET['status'];

mysqli_query($conn, "UPDATE tblaporan SET status='$status' WHERE id='$id'");
header("Location: admin.php");
exit;
?>
