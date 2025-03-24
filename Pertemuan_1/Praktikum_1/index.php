<?php  
    echo "hello word!<br>";

    $namaDepan = "Abdullah";
    $namaBelakang = "Al gacor";

    // Menampilkan nama lengkap
    echo $namaDepan . " " . $namaBelakang . "<br>";
    echo "$namaDepan $namaBelakang<br>"; // Interpolasi string

    echo "ini uji coba!<br>";

    // Tambahkan string ke namaDepan menggunakan .=
    $namaDepan .= " Abel ";
    echo $namaDepan . "<br>"; // Menampilkan hasil perubahan $namaDepan

    // Menggunakan konstanta
    define("PHI", 3.14);

    $jari = 10; // Tambahkan titik koma di akhir baris!
    $luas = PHI * $jari ** 2; // ** adalah pangkat

    echo "Luas lingkaran adalah $luas";
?>
