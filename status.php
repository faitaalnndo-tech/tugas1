<?php
include "koneksi.php";

if (isset($_POST['id'])) {
  $id = $_POST['id'];
  mysqli_query($conn, "UPDATE tblaporan SET status='done' WHERE id='$id'");
}

header("Location: index.php");
exit;
?>
