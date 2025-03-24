<?php 
// Array temanSaya
$temanSaya = ["Jamet", "ALam", "Nobel"];
print_r($temanSaya); // untuk menampilkan seluruh nilai array
echo "<br>";
echo $temanSaya[2]; // Menampilkan elemen ketiga dari array (index 2)
echo "<br>";
echo count($temanSaya); // Menampilkan jumlah elemen array
echo "<br>";

// Menampilkan array sebagai ordered list
echo "<ol>";
foreach ($temanSaya as $key => $value) {
     echo "<li>$key. $value</li>";  
}
echo "</ol>";

// Menambah elemen baru di index 5
$temanSaya[5] = "eko";

// Menghapus elemen index 0
unset($temanSaya[0]);

// Menampilkan array setelah modifikasi
print_r($temanSaya);

echo "<br><br><br>";

// Array buah dengan key-value
$buah = ["m" => "markisa", "d" => "duren"];

// Perbaikan dari 'rint_r' menjadi 'print_r'
print_r($buah);
?>
