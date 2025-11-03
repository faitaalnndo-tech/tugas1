<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Selesai - Mie Gacoan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {font-family:'Poppins',sans-serif;background-color:#0f1626;color:#e6e6e6;margin:0;}
    .sidebar {width:230px;height:100vh;background-color:#182239;position:fixed;top:0;left:0;padding-top:30px;box-shadow:3px 0 10px rgba(0,0,0,0.4);}
    .sidebar a {display:block;color:#e6e6e6;padding:12px 20px;text-decoration:none;font-weight:500;border-left:4px solid transparent;}
    .sidebar a:hover, .sidebar a.active {background-color:#1f2c4d;color:#ff6fb1;border-left:4px solid #ff6fb1;}
    .content {margin-left:230px;padding:40px;}
    table th {background-color:#1f2c4d;color:#009dff;}
    table td {background-color:#182239;border-color:#2b365a;}
    .badge-done {background-color:#28a745;padding:6px 10px;border-radius:6px;color:#fff;}
  </style>
</head>
<body>

<div class="sidebar">
  <h3><img src="cop.png" alt="Logo" style="width:120px;"></h3>
  <a href="admin.php">📋 Laporan Aktif</a>
  <a href="komplain.php" class="active">✅ Laporan Selesai</a>
</div>

<div class="content">
  <h1>Laporan yang Sudah Selesai</h1>

  <div class="card bg-dark border-0 rounded-3 p-3">
    <div class="table-responsive">
      <table class="table table-bordered text-center align-middle">
        <thead>
          <tr>
            <th>Resi</th>
            <th>Nama</th>
            <th>Meja</th>
            <th>Laporan</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $q = mysqli_query($conn, "SELECT * FROM tblaporan WHERE status='done' ORDER BY id DESC");
          if (mysqli_num_rows($q) > 0) {
            while ($d = mysqli_fetch_assoc($q)) {
              echo "<tr>
                      <td>{$d['resi']}</td>
                      <td>{$d['nama']}</td>
                      <td>{$d['meja']}</td>
                      <td><a href='detail.php?id={$d['id']}'>Lihat</a></td>
                      <td><span class='badge-done'>DONE</span></td>
                    </tr>";
            }
          } else {
            echo "<tr><td colspan='5'>Belum ada laporan selesai.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>
