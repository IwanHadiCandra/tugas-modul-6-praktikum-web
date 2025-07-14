<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Produk</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <h2 class="mb-4">Daftar Produk Toko Online</h2>

    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Produk Baru</a>

    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM produk";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>".$row['id_produk']."</td>";
                  echo "<td>".$row['nama_produk']."</td>";
                  echo "<td>Rp ".number_format($row['harga'])."</td>";
                  echo "<td>".$row['stok']."</td>";
                  echo "<td>
                          <a href='edit.php?id=".$row['id_produk']."' class='btn btn-sm btn-warning'>Edit</a>
                          <a href='hapus.php?id=".$row['id_produk']."' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                        </td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='5' class='text-center'>Tidak ada data produk</td></tr>";
              }

              $conn->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS Bundle (Opsional, hanya jika pakai komponen JS) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
