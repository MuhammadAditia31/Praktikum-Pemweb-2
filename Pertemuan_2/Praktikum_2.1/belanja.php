<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Belanja Online</title>
  <!-- Link CSS Bootstrap -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >
</head>
<body>
  <div class="container my-4">
    <div class="row">
      <!-- Kolom kiri untuk Form Belanja -->
      <div class="col-md-8">
        <h2>Belanja Online</h2>
        <hr>
        <form method="POST" action="">
          <div class="mb-3">
            <label for="customer" class="form-label">Customer</label>
            <input
              type="text"
              class="form-control"
              id="customer"
              name="customer"
              placeholder="Nama Customer"
              required
            >
          </div>

          <div class="mb-3">
            <label class="form-label d-block">Pilih Produk</label>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="produk"
                id="tv"
                value="TV"
                required
              >
              <label class="form-check-label" for="tv">TV</label>
            </div>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="produk"
                id="kulkas"
                value="Kulkas"
                required
              >
              <label class="form-check-label" for="kulkas">Kulkas</label>
            </div>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="produk"
                id="mesin_cuci"
                value="Mesin Cuci"
                required
              >
              <label class="form-check-label" for="mesin_cuci">Mesin Cuci</label>
            </div>
          </div>

          <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input
              type="number"
              class="form-control"
              id="jumlah"
              name="jumlah"
              placeholder="Jumlah"
              required
            >
          </div>

          <!-- Tombol Kirim menjadi hijau (btn-success) -->
          <button type="submit" class="btn btn-success" name="proses">Kirim</button>
        </form>
      </div>

      <!-- Kolom kanan untuk Daftar Harga dengan header/footer berwarna biru -->
      <div class="col-md-4">
        <div class="card" style="max-width: 100%;">
          <div class="card-header bg-primary text-white">Daftar Harga</div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">TV: Rp 4.200.000</li>
            <li class="list-group-item">Kulkas: Rp 3.100.000</li>
            <li class="list-group-item">Mesin Cuci: Rp 3.800.000</li>
          </ul>
          <div class="card-footer bg-primary text-white">
            <small>Harga Dapat Berubah Setiap Saat</small>
          </div>
        </div>
      </div>
    </div>

    <?php
    // Jika tombol "Kirim" ditekan
    if (isset($_POST['proses'])) {
        $customer = $_POST['customer'];
        $produk   = $_POST['produk'];
        $jumlah   = $_POST['jumlah'];

        // Tentukan harga produk
        switch($produk) {
          case "TV":
            $harga = 4200000;
            break;
          case "Kulkas":
            $harga = 3100000;
            break;
          case "Mesin Cuci":
            $harga = 3800000;
            break;
          default:
            $harga = 0;
            break;
        }

        // Hitung total belanja
        $total_belanja = $harga * $jumlah;

        // Tampilkan hasil belanja tanpa tabel
        echo "<hr>";
        echo "<h5>Hasil Belanja:</h5>";
        echo "<p>Nama Customer: <strong>$customer</strong></p>";
        echo "<p>Produk Pilihan: <strong>$produk</strong></p>";
        echo "<p>Jumlah Beli: <strong>$jumlah</strong></p>";
        echo "<p>Total Belanja: <strong>Rp " . number_format($total_belanja, 0, ',', '.') . "</strong></p>";
    }
    ?>
  </div>
</body>
</html>
