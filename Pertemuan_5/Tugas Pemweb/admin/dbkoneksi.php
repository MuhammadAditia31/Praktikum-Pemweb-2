<?php
$host = "localhost";
$dbname = "db_puskesmas";
$user = "root";     // Sesuaikan jika beda
$pass = "";         // Sesuaikan jika pakai password

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
