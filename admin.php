<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin - Laporan Aktif</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #0f1626;
      color: #e6e6e6;
      margin: 0;
    }

    .sidebar {
      width: 230px;
      height: 100vh;
      background-color: #182239;
      position: fixed;
      top: 0;
      left: 0;
      padding-top: 30px;
      box-shadow: 3px 0 10px rgba(0,0,0,0.4);
    }

    .sidebar h3 {
      color: #009dff;
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar a {
      display: block;
      color: #e6e6e6;
      padding: 12px 20px;
      text-decoration: none;
      font-weight: 500;
      border-left: 4px solid transparent;
      transition: 0.2s;
    }

    .sidebar a:hover, .sidebar a.active {
      background-color: #1f2c4d;
      color: #ff6fb1;
      border-left: 4px solid #ff6fb1;
    }

    .content {
      margin-left: 230px;
      padding: 40px;
    }

    h1 {
      text-align: center;
      font-weight: 700;
      color: #009dff;
      margin-bottom: 25px;
    }

    .card {
      background: #182239;
      border: none;
      border-radius: 14px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
      color: #e6e6e6;
    }

    table th {
      background-color: #1f2c4d;
      color: #009dff;
    }

    table td {
      background-color: #182239;
      border-color: #2b365a;
      vertical-align: middle;
    }

    .badge-status {
      border-radius: 6px;
      padding: 6px 10px;
      font-size: 0.85rem;
      font-weight: 500;
      color: #fff;
    }

    .badge-unseen { background-color: #888; }
    .badge-seen { background-color: #009dff; }
    .badge-progress { background-color: #ffc107; color: #000; }

    .btn-gacoan {
      background-color: #009dff;
      color: #fff;
      border: none;
      border-radius: 8px;
      transition: 0.2s;
      padding: 6px 12px;
      font-weight: 600;
      font-size: 0.9rem;
    }

    .btn-gacoan:hover {
      background-color: #007ed1;
    }

    footer {
      text-align: center;
      margin-top: 40px;
      font-size: 0.9rem;
      color: #888;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <h3><img src="cop.png" alt="Logo" style="width:120px;"></h3>
  <a href="admin.php" class="active">📋 Laporan Aktif</a>
  <a href="komplain.php">✅ Laporan Selesai</a>
</div>

<div class="content">
  <h1>Laporan Aktif</h1>

  <div class="card">
    <div class="card-body table-responsive">
      <table class="table table-bordered text-center align-middle">
        <thead>
          <tr>
            <th>Resi</th>
            <th>Nama</th>
            <th>Meja</th>
            <th>Laporan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // hanya ambil laporan yang BELUM DONE
          $q = mysqli_query($conn, "SELECT * FROM tblaporan WHERE status!='done' ORDER BY id DESC");
          while ($d = mysqli_fetch_assoc($q)) {
            $statusClass = "badge-" . strtolower($d['status']);
            echo "<tr>
                    <td>{$d['resi']}</td>
                    <td>{$d['nama']}</td>
                    <td>{$d['meja']}</td>
                    <td><a href='detail.php?id={$d['id']}'>Lihat</a></td>
                    <td><span class='badge-status $statusClass'>".strtoupper($d['status'])."</span></td>
                    <td>";
            if ($d['status'] == 'seen') {
              echo "<a href='ubah.php?id={$d['id']}&status=progress' class='btn btn-gacoan btn-sm'>Set Progress</a>";
            } else {
              echo "-";
            }
            echo "</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <footer>
    <p>© 2025 Mie Gacoan | Panel Admin</p>
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
