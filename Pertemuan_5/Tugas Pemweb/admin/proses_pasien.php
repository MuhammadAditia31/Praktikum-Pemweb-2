<?php
include 'dbkoneksi.php';

// HAPUS DATA
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $sql = "DELETE FROM pasien WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    header("Location: data_pasien.php");
    exit;
}

// SIMPAN atau UPDATE DATA
if (isset($_POST['proses']) || $_POST) {
    $id           = $_POST['id'];
    $kode         = $_POST['kode'];
    $nama         = $_POST['nama'];
    $tmp_lahir    = $_POST['tmp_lahir'];
    $tgl_lahir    = $_POST['tgl_lahir'];
    $gender       = $_POST['gender'];
    $email        = $_POST['email'];
    $alamat       = $_POST['alamat'];
    $kelurahan_id = $_POST['kelurahan_id'];

    if (empty($id)) {
        // INSERT DATA
        $sql = "INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$kode, $nama, $tmp_lahir, $tgl_lahir, $gender, $email, $alamat, $kelurahan_id]);
    } else {
        // UPDATE DATA
        $sql = "UPDATE pasien SET 
                kode = ?, nama = ?, tmp_lahir = ?, tgl_lahir = ?, gender = ?, email = ?, alamat = ?, kelurahan_id = ?
                WHERE id = ?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$kode, $nama, $tmp_lahir, $tgl_lahir, $gender, $email, $alamat, $kelurahan_id, $id]);
    }

    header("Location: data_pasien.php");
    exit;
}
?>
