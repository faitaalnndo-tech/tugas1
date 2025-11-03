<?php
include "koneksi.php";

$id = $_GET['id'];
mysqli_query($conn, "UPDATE tblaporan SET status='seen' WHERE id='$id'");
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tblaporan WHERE id='$id'"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Laporan</title>
  <style>
    body {font-family: Arial; padding: 20px;}
    a {color: #e67e22; text-decoration: none;}
  </style>
</head>
<body>

<h2>Detail Laporan</h2>
<p><b>Resi:</b> <?= $data['resi'] ?></p>
<p><b>Nama:</b> <?= $data['nama'] ?></p>
<p><b>Meja:</b> <?= $data['meja'] ?></p>
<p><b>Laporan:</b><br><?= nl2br($data['laporan']) ?></p>
<p><b>Status:</b> <?= strtoupper($data['status']) ?></p>

<a href="admin.php">← Kembali</a>

</body>
</html>
