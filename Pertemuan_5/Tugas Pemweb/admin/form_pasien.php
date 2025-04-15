<?php
include 'dbkoneksi.php';
include 'header_puskesmas.php';
include 'sidebar_puskesmas.php';


$edit = false;
$pasien = [
    'id' => '',
    'kode' => '',
    'nama' => '',
    'tmp_lahir' => '',
    'tgl_lahir' => '',
    'gender' => '',
    'email' => '',
    'alamat' => '',
    'kelurahan_id' => ''
];

if (isset($_GET['id'])) {
    $edit = true;
    $sql = "SELECT * FROM pasien WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_GET['id']]);
    $pasien = $stmt->fetch();
}

// ambil data kelurahan untuk dropdown
$kelurahan = $dbh->query("SELECT * FROM kelurahan")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form Pasien</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <a class="navbar-brand" href="data_pasien.php">🩺 Puskesmas</a>
  </nav>

  <div class="content-wrapper p-4">
    <div class="container">
      <h3 class="mb-4"><?= $edit ? 'Edit' : 'Tambah' ?> Data Pasien</h3>
      <form method="POST" action="proses_pasien.php">
        <input type="hidden" name="id" value="<?= $pasien['id'] ?>">

        <div class="form-group">
          <label>Kode</label>
          <input type="text" name="kode" class="form-control" value="<?= $pasien['kode'] ?>" required>
        </div>

        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" value="<?= $pasien['nama'] ?>" required>
        </div>

        <div class="form-group">
          <label>Tempat Lahir</label>
          <input type="text" name="tmp_lahir" class="form-control" value="<?= $pasien['tmp_lahir'] ?>" required>
        </div>

        <div class="form-group">
          <label>Tanggal Lahir</label>
          <input type="date" name="tgl_lahir" class="form-control" value="<?= $pasien['tgl_lahir'] ?>" required>
        </div>

        <div class="form-group">
          <label>Gender</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" value="L" <?= $pasien['gender'] == 'L' ? 'checked' : '' ?>>
            <label class="form-check-label">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" value="P" <?= $pasien['gender'] == 'P' ? 'checked' : '' ?>>
            <label class="form-check-label">Perempuan</label>
          </div>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="<?= $pasien['email'] ?>" required>
        </div>

        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control" required><?= $pasien['alamat'] ?></textarea>
        </div>

        <div class="form-group">
          <label>Kelurahan</label>
          <select name="kelurahan_id" class="form-control" required>
            <option value="">-- Pilih Kelurahan --</option>
            <option value="1" <?= $pasien['kelurahan_id'] == 1 ? 'selected' : '' ?>>Grogol</option>
            <option value="2" <?= $pasien['kelurahan_id'] == 2 ? 'selected' : '' ?>>Beji</option>
            <option value="3" <?= $pasien['kelurahan_id'] == 3 ? 'selected' : '' ?>>Sawangan</option>
            <option value="4" <?= $pasien['kelurahan_id'] == 4 ? 'selected' : '' ?>>Banten</option>
          </select>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">
          <?= $edit ? 'Update' : 'Submit' ?>
        </button>

        <?php include 'footer_puskesmas.php'; ?>

