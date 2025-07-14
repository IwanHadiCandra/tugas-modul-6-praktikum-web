<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama_produk = $_POST['nama_produk'];
  $harga       = $_POST['harga'];
  $stok        = $_POST['stok'];

  $sql = "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama_produk', '$harga', '$stok')";

  if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
  } else {
    echo "Error: " . $conn->error;
  }

  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Produk</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="mb-4 text-center text-primary">Tambah Produk Baru</h2>
        
        <div class="card">
          <div class="card-body">
            <form action="" method="post">
              <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan nama produk" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Masukkan harga produk" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" placeholder="Masukkan jumlah stok" required>
              </div>

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Simpan Produk</button>
                <a href="index.php" class="btn btn-secondary">Kembali ke Daftar Produk</a>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS Bundle (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
