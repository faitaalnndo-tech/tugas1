<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Komplain Mie Gacoan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #0f1626;
      color: #f1f1f1;
      padding: 40px 0;
    }

    h1 {
      text-align: center;
      font-weight: 700;
      color: #009dff;
      margin-bottom: 25px;
    }

    h1 span {
      color: #ff6fb1;
    }

    .card {
      background: #182239;
      border: none;
      border-radius: 14px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
      color: #e6e6e6;
    }

    .card-header {
      background-color: #1f2c4d;
      color: #fff;
      border-top-left-radius: 14px;
      border-top-right-radius: 14px;
      font-weight: 600;
      text-align: center;
    }

    .form-control {
      background-color: #1a2238;
      border: 1px solid #2a3355;
      color: #fff;
    }

    .form-control:focus {
      border-color: #009dff;
      box-shadow: none;
    }

    .btn-gacoan {
      background-color: #009dff;
      border: none;
      color: #fff;
      font-weight: 600;
      border-radius: 8px;
      transition: 0.2s;
    }

    .btn-gacoan:hover {
      background-color: #007ed1;
    }

    .badge-status {
      background-color: #ff6fb1;
      color: #fff;
      border-radius: 8px;
      padding: 5px 10px;
      font-size: 0.85rem;
    }

    table th {
      background-color: #1f2c4d;
      color: #009dff;
    }

    table td {
      background-color: #182239;
      border-color: #2b365a;
    }

    footer {
      text-align: center;
      margin-top: 40px;
      font-size: 0.9rem;
      color: #888;
    }

    .alert {
      border-radius: 10px;
    }
  </style>
</head>

<body>

<div class="container" style="max-width: 850px;">
 <h1>
  <img src="cop.png" alt="Mie Gacoan Logo" style="width:160px; height:auto; margin-bottom:10px;">
  <br>
  <small style="font-size:16px; color:#ccc;">Laporan Komplain Pelanggan</small>
</h1>

  <!-- Form Komplain -->
  <div class="card mb-4">
    <div class="card-header">Form Komplain</div>
    <div class="card-body">
      <form method="POST">
        <div class="mb-3">
          <label class="form-label">Nomor Resi</label>
          <input type="text" name="resi" class="form-control" placeholder="Masukkan Nomor Resi" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" name="nama" class="form-control" placeholder="Nama Anda" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Nomor Meja</label>
          <input type="number" name="meja" class="form-control" placeholder="Nomor Meja" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Isi Laporan</label>
          <textarea name="laporan" class="form-control" rows="3" placeholder="Tuliskan keluhan Anda..." required></textarea>
        </div>
        <button type="submit" name="kirim" class="btn btn-gacoan w-100">Kirim Laporan</button>
      </form>
    </div>
  </div>

  <?php
  if (isset($_POST['kirim'])) {
    $resi = $_POST['resi'];
    $nama = $_POST['nama'];
    $meja = $_POST['meja'];
    $laporan = $_POST['laporan'];
    $status = "unseen";

    $cekResi = mysqli_query($conn, "SELECT * FROM tblaporan WHERE resi='$resi'");
    if (mysqli_num_rows($cekResi) > 0) {
      echo "<div class='alert alert-danger mt-3'>❌ Nomor resi sudah digunakan, silakan pakai nomor lain.</div>";
    } else {
      $sql = "INSERT INTO tblaporan (resi, meja, nama, laporan, status) VALUES ('$resi', '$meja', '$nama', '$laporan', '$status')";
      if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success mt-3'>✅ Laporan berhasil dikirim! Nomor Resi Anda: <b>$resi</b></div>";
      } else {
        echo "<div class='alert alert-danger mt-3'>❌ Gagal mengirim laporan.</div>";
      }
    }
  }
  ?>

  <!-- Cek Laporan -->
  <div class="card mt-4">
    <div class="card-header">Cek Laporan Berdasarkan Nomor Meja</div>
    <div class="card-body">
      <form method="GET" class="row g-2 mb-3">
        <div class="col-md-8">
          <input type="number" name="meja" class="form-control" placeholder="Masukkan Nomor Meja Anda" required>
        </div>
        <div class="col-md-4">
          <button type="submit" class="btn btn-gacoan w-100">Cek Laporan</button>
        </div>
      </form>

      <?php
      if (isset($_GET['meja'])) {
        $meja = $_GET['meja'];
        $cek = mysqli_query($conn, "SELECT * FROM tblaporan WHERE meja='$meja' ORDER BY id DESC");
        if (mysqli_num_rows($cek) > 0) {
          echo "<div class='table-responsive'><table class='table table-bordered text-center'>
                  <thead>
                    <tr>
                      <th>Nomor Resi</th>
                      <th>Nama</th>
                      <th>Laporan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>";
          while ($d = mysqli_fetch_assoc($cek)) {
            echo "<tr>
                    <td>{$d['resi']}</td>
                    <td>{$d['nama']}</td>
                    <td>{$d['laporan']}</td>
                    <td><span class='badge-status'>".strtoupper($d['status'])."</span></td>
                    <td>";
            if ($d['status'] == "progress") {
              echo "<form method='POST' action='status.php' style='margin:0'>
                      <input type='hidden' name='id' value='".$d['id']."'>
                      <button type='submit' class='btn btn-success btn-sm'>Selesai</button>
                    </form>";
            } else {
              echo "-";
            }
            echo "</td></tr>";
          }
          echo "</tbody></table></div>";
        } else {
          echo "<div class='alert alert-info'>Belum ada laporan untuk meja ini.</div>";
        }
      }
      ?>
    </div>
  </div>

  <footer>
    <p>© 2025 Mie Gacoan | Sistem Laporan Pelanggan</p>
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
