<?php
include 'dbkoneksi.php';
include 'header_puskesmas.php';
include 'sidebar_puskesmas.php';
?>

<!-- Content Wrapper -->
<div class="content-wrapper p-4">
  <div class="container-fluid">
    <h3 class="mb-4">📋 Data Pasien</h3>
    <a href="form_pasien.php" class="btn btn-success mb-3">+ Tambah Pasien</a>
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th>Kode</th>
          <th>Nama</th>
          <th>TTL</th>
          <th>Gender</th>
          <th>Email</th>
          <th>Alamat</th>
          <th>Kelurahan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT p.*, k.nama AS kelurahan FROM pasien p INNER JOIN kelurahan k ON p.kelurahan_id = k.id";
        $stmt = $dbh->query($sql);
        $no = 1;
        foreach ($stmt as $row) :
        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $row['kode'] ?></td>
          <td><?= $row['nama'] ?></td>
          <td><?= $row['tmp_lahir'] ?> / <?= $row['tgl_lahir'] ?></td>
          <td><?= $row['gender'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['alamat'] ?></td>
          <td><?= $row['kelurahan'] ?></td>
          <td>
            <a href="form_pasien.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="proses_pasien.php?hapus=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include 'footer_puskesmas.php'; ?>
