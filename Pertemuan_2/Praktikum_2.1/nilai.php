<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        fieldset {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Form Nilai Mahasiswa</h2>

    <fieldset>
        <legend>Form Input Nilai Mahasiswa</legend>

        <?php
            $data_matkul = [
                "Web1" => "Pemrograman Web 1", 
                "Web2" => "Pemrograman Web 2",
                "BASDAT" => "Basis Data",
                "UI/UX" => "UI/UX",
                "JARKOM" => "Jaringan Komputer",
                "PKK" => "Pemrograman Keamanan Komputer",
            ];
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-address-card"></i>
                        </div>
                    </div>
                    <input id="nama" name="nama" placeholder="Your Name" type="text" required class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="matkul">Mata Kuliah</label>
                <select id="matkul" name="matkul" class="custom-select" required>
                    <?php
                        foreach ($data_matkul as $key => $value) {
                            echo "<option value='$key'>$value</option>";
                        }
                    ?>
                </select>
                <small class="form-text text-muted">Select Mata Kuliah</small>
            </div>

            <div class="form-group">
                <label for="nilai_uts">Nilai UTS</label>
                <input id="nilai_uts" name="nilai_uts" placeholder="Nilai UTS" type="text" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nilai_uas">Nilai UAS</label>
                <input id="nilai_uas" name="nilai_uas" placeholder="Nilai UAS" type="text" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nilai_tugas">Nilai Tugas / Praktikum</label>
                <input id="nilai_tugas" name="nilai_tugas" placeholder="Nilai" type="text" class="form-control" required>
            </div> 

            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </fieldset>

    <?php 
    if (isset($_GET['submit'])) {
        $nama = $_GET['nama'];
        $matkul = $_GET['matkul'];
        $nilai_uts = $_GET['nilai_uts'];
        $nilai_uas = $_GET['nilai_uas'];
        $nilai_tugas = $_GET['nilai_tugas'];
        
    ?>

    <h2>Hasil Perhitungan Nilai Mahasiswa</h2>
    <p>Nama Mahasiswa: <?= htmlspecialchars($nama); ?></p>
    <p>Mata Kuliah: <?= htmlspecialchars($matkul); ?></p>
    <p>Nilai UTS: <?= htmlspecialchars($nilai_uts); ?></p>
    <p>Nilai UAS: <?= htmlspecialchars($nilai_uas); ?></p>
    <p>Nilai Tugas: <?= htmlspecialchars($nilai_tugas); ?></p>
    
    <?php } ?>
</div>

</body>
</html>