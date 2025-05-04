<?php 
class NilaiMahasiswa {
    public $nama;
    public $matakuliah;
    public $nilai_uts;
    public $nilai_uas;
    public $nilai_tugas;
    public const PERSENTASE_UTS = 0.25;
    public const PERSENTASE_UAS = 0.30;
    public const PERSENTASE_TUGAS = 0.45;

    public function __construct($nama, $matakuliah, $nilai_uts, $nilai_uas, $nilai_tugas){
        $this->nama = $nama;
        $this->matakuliah = $matakuliah;
        $this->nilai_uts = $nilai_uts;
        $this->nilai_uas = $nilai_uas;
        $this->nilai_tugas = $nilai_tugas;
    }

    public function getNA(){
        return ($this->nilai_uts * self::PERSENTASE_UTS) +
               ($this->nilai_uas * self::PERSENTASE_UAS) +
               ($this->nilai_tugas * self::PERSENTASE_TUGAS);
    }

    // Optional: Fungsi alternatif (boleh diaktifkan)
    // public function getNilaiAkhir(){
    //     return $this->getNA();
    // }

    public function kelulusan(){
        return $this->getNA() >= 60 ? "Lulus" : "Ya Mengulang ekek";
    }
}

// Contoh penggunaan:
$mhs = new NilaiMahasiswa("Jarwo", "PPKN", 70, 65, 80);
echo "Nama: {$mhs->nama}<br>";
echo "Mata Kuliah: {$mhs->matakuliah}<br>";
echo "Nilai Akhir: " . number_format($mhs->getNA(), 2) . "<br>";
echo "Status: " . $mhs->kelulusan();
?>
