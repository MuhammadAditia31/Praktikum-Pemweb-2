<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <h1 class="mb-4">Data Nilai Mahasiswa</h1>
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Tugas</th>
            <th scope="col">UTS</th>
            <th scope="col">UAS</th>
            <th scope="col">Total</th>
            <th scope="col">Predikat</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $nilai1 = ["nim" => 110224218, "nama" => "Upin", "tugas" => 85, "uts" => 80, "uas" => 90];
            $nilai2 = ["nim" => 110224219, "nama" => "Fizi", "tugas" => 95, "uts" => 90, "uas" => 95];
            $nilai3 = ["nim" => 110224220, "nama" => "Ipin", "tugas" => 75, "uts" => 70, "uas" => 80];
            $mhs = [$nilai1, $nilai2, $nilai3];

            $no = 1;
            foreach ($mhs as $item) {
              $total = ($item['tugas'] + $item['uts'] + $item['uas']) / 3;

              // Menentukan predikat
              if ($total >= 90) {
                $predikat = "A";
              } elseif ($total >= 80) {
                $predikat = "B";
              } elseif ($total >= 70) {
                $predikat = "C";
              } elseif ($total >= 60) {
                $predikat = "D";
              } else {
                $predikat = "E";
              }
          ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $item['nim'] ?></td>
              <td><?= $item['nama'] ?></td>
              <td><?= $item['tugas'] ?></td>
              <td><?= $item['uts'] ?></td>
              <td><?= $item['uas'] ?></td>
              <td><?= number_format($total, 2) ?></td>
              <td><?= $predikat ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
