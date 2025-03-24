<?php
// Class Mahasiswa
class Mahasiswa {
    private $nim;
    private $mataKuliah;
    private $nilai;

    public function __construct($nim, $mataKuliah, $nilai) {
        $this->nim = $nim;
        $this->mataKuliah = $mataKuliah;
        $this->nilai = $nilai;
    }

    public function getNim() {
        return $this->nim;
    }

    public function getMataKuliah() {
        return $this->mataKuliah;
    }

    public function getNilai() {
        return $this->nilai;
    }

    public function getGrade() {
        if ($this->nilai >= 85) return 'A';
        elseif ($this->nilai >= 70) return 'B';
        elseif ($this->nilai >= 60) return 'C';
        elseif ($this->nilai >= 50) return 'D';
        else return 'E';
    }

    public function getStatus() {
        $grade = $this->getGrade();
        if ($grade == 'A' || $grade == 'B' || $grade == 'C') {
            return 'LULUS';
        } else {
            return 'TIDAK LULUS';
        }
    }
}
?>

<!-- Form HTML -->
<!DOCTYPE html>
<html>
<head>
    <title>Form Nilai Ujian</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h3>Form Nilai Ujian</h3>
    <form method="POST">
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" name="nim" required>
        </div>
        <div class="form-group">
            <label for="matkul">Pilih MK</label>
            <select class="form-control" name="matkul">
                <option>Data Warehouse</option>
                <option>Web Programming</option>
                <option>Database</option>
                <option>Basis Data</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="number" class="form-control" name="nilai" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nim = $_POST['nim'];
        $matkul = $_POST['matkul'];
        $nilai = $_POST['nilai'];

        $mahasiswa = new Mahasiswa($nim, $matkul, $nilai);

        echo "<hr>";
        echo "NIM : " . $mahasiswa->getNim() . "<br>";
        echo "Nama Mata Kuliah : " . $mahasiswa->getMataKuliah() . "<br>";
        echo "Nilai : " . $mahasiswa->getNilai() . "<br>";
        echo "Hasil Ujian : " . $mahasiswa->getGrade() . "<br>";
        echo "Grade : " . $mahasiswa->getStatus() . "<br>";
    }
    ?>

    <br><br>
    <p><strong>Lab Pemrograman Web Lanjutan</strong><br>
        Dosen: Sirojul Munir S.SI.,M.Kom<br>
        STT-NF - Kampus B</p>
</div>
</body>
</html>
