        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <title>Form Registrasi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            /* Styling tabel hasil registrasi */
            .hasil-registrasi {
            border: 2px solid #000;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            }
            .hasil-registrasi td {
            padding: 8px;
            vertical-align: top;
            border: 1px solid #000;
            }
            .hasil-registrasi td.label {
            width: 150px;
            font-weight: bold;
            }
            .hasil-registrasi td.separator {
            width: 10px;
            }
            /* Container form */
            .form-container {
            background-color: rgb(204, 204, 175);
            color: black;
            padding: 20px;
            border-radius: 8px;
            }
        </style>
        </head>
        <body>
        <h2 class="text-center my-4">Form Registrasi</h2>

        <div class="container">
            <div class="row justify-content-center">
            <!-- Form Registrasi -->
            <div class="col-md-8 form-container">
                <form method="POST" action="">
                <!-- NIM -->
                <div class="mb-3 row">
                    <label for="nim" class="col-sm-4 col-form-label">NIM</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" required />
                    </div>
                </div>
                <!-- Nama Lengkap -->
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required />
                    </div>
                </div>
                <!-- Jenis Kelamin -->
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="lakiLaki" type="radio" name="jenisKelamin" value="L" required />
                        <label class="form-check-label" for="lakiLaki">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="perempuan" type="radio" name="jenisKelamin" value="P" required />
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    </div>
                </div>
                <!-- Program Studi -->
                <?php 
                $ar_prodi = ["TI" => "Teknik Informatika", "SI" => "Sistem Informasi", "BD" => "Bisnis Digital"];
                ?>
                <div class="mb-3 row">
                    <label for="programStudi" class="col-sm-4 col-form-label">Program Studi</label>
                    <div class="col-sm-8">
                    <select class="form-select" id="programStudi" name="programStudi" required>
                        <option value="">Pilih Program Studi</option>
                        <?php 
                        foreach ($ar_prodi as $k => $v) {
                        echo "<option value='$k'>$v</option>";
                        }
                        ?>
                    </select>
                    </div>
                </div>
                <!-- Skill -->
                <?php 
                $ar_skill = [
                    "HTML" => 10, 
                    "CSS" => 20, 
                    "JavaScript" => 20, 
                    "RWD Bootstrap" => 20, 
                    "PHP" => 30, 
                    "Python" => 30, 
                    "Java" => 50
                ];
                ?>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Skill Web &amp; Programming</label>
                    <div class="col-sm-8">
                    <?php foreach ($ar_skill as $k => $v) { ?>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="skill[]" value="<?= $k ?>" />
                        <label class="form-check-label"><?= $k ?></label>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <!-- Tempat Domisili -->
                <div class="mb-3 row">
                    <label for="domisili" class="col-sm-4 col-form-label">Tempat Domisili</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="domisili" name="domisili" placeholder="Contoh: Jakarta" required />
                    </div>
                </div>
                <!-- Email -->
                <div class="mb-3 row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
                    </div>
                </div>
                <!-- Tombol Submit -->
                <div class="mb-3 row">
                    <div class="col-sm-8 offset-sm-4">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>

        <hr>
        <h3 class="text-center">Hasil Registrasi:</h3>

        <?php
        // Fungsi untuk menentukan kategori skill
        function kategoriSkill($skor) {
            if ($skor >= 100) {
                return "Sangat Baik";
            } elseif ($skor >= 60) {
                return "Baik";
            } elseif ($skor >= 40) {
                return "Cukup";
            } elseif ($skor > 0) {
                return "Kurang";
            } else {
                return "Tidak Ada";
            }
        }

        if (isset($_POST['submit'])) {
            $nim           = $_POST['nim'];
            $nama          = $_POST['nama'];
            $jenisKelamin  = $_POST['jenisKelamin'];
            $programStudi  = $_POST['programStudi'];
            $domisili      = $_POST['domisili'];
            $email         = $_POST['email'];

            // Skill yang dipilih
            $selected_skills = isset($_POST['skill']) ? $_POST['skill'] : [];
            $total_skor_skill = 0;
            $skill_str = "Tidak ada skill yang dipilih";
            if (!empty($selected_skills)) {
                $skill_str = implode(", ", $selected_skills);
                foreach ($selected_skills as $skill) {
                    if (isset($ar_skill[$skill])) {
                        $total_skor_skill += $ar_skill[$skill];
                    }
                }
            }

            // Menentukan kategori skill
            $kategori = kategoriSkill($total_skor_skill);

            // Tampilkan hasil dalam tabel rapi
            echo "<div class='container my-4' style='color: black;'>";
            echo "<table class='hasil-registrasi'>";
            echo "<tr><td class='label'>NIM</td><td class='separator'>:</td><td>$nim</td></tr>";
            echo "<tr><td class='label'>Nama</td><td class='separator'>:</td><td>$nama</td></tr>";
            echo "<tr><td class='label'>Jenis Kelamin</td><td class='separator'>:</td><td>$jenisKelamin</td></tr>";
            echo "<tr><td class='label'>Program Studi</td><td class='separator'>:</td><td>$programStudi</td></tr>";
            echo "<tr><td class='label'>Skill</td><td class='separator'>:</td><td>$skill_str</td></tr>";
            echo "<tr><td class='label'>Skor Skill</td><td class='separator'>:</td><td>$total_skor_skill</td></tr>";
            echo "<tr><td class='label'>Kategori Skill</td><td class='separator'>:</td><td>$kategori</td></tr>";
            echo "<tr><td class='label'>Email</td><td class='separator'>:</td><td>$email</td></tr>";
            echo "<tr><td class='label'>Domisili</td><td class='separator'>:</td><td>$domisili</td></tr>";
            echo "</table>";
            echo "</div>";
        }
        ?>
        </body>
        </html>
