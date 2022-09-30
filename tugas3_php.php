<?php
//daftar data nilai mahasiswa menggunakan array scalar
$m1 = ['nim'=>'2201', 'nama'=>'Gibson', 'nilai'=>88];
$m2 = ['nim'=>'2202', 'nama'=>'Idham', 'nilai'=>60];
$m3 = ['nim'=>'2203', 'nama'=>'Dafuk', 'nilai'=>78];
$m4 = ['nim'=>'2204', 'nama'=>'Abi', 'nilai'=>93];
$m5 = ['nim'=>'2205', 'nama'=>'Jatuwl', 'nilai'=>18];
$m6 = ['nim'=>'2206', 'nama'=>'Taqy', 'nilai'=>58];
$m7 = ['nim'=>'2207', 'nama'=>'Cahya', 'nilai'=>83];
$m8 = ['nim'=>'2208', 'nama'=>'Arel', 'nilai'=>85];
$m9 = ['nim'=>'2209', 'nama'=>'Akbar', 'nilai'=>80];
$m10 = ['nim'=>'2210', 'nama'=>'Taufiq', 'nilai'=>75];

//array asosiatif
$mahasiswa = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10];

//fungsi agregat
$nos = count($mahasiswa);
$amt_n = array_column($mahasiswa, 'nilai');
$ttl_n = array_sum($amt_n);
$n_hi = max($amt_n);
$n_lo = min($amt_n);
$n_av = $ttl_n / $nos;

//keterangan dari fungsi agregat
$keterangan = [
    'Nilai Tertinggi'=>$n_hi,
    'Nilai Terendah'=>$n_lo,
    'Nilai Rata-Rata'=>$n_av,
    'Jumlah Mahasiswa'=>$nos,
];
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tugas 3 PHP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body style="background-color: #34568b;">
        <h3 class="text-center text-white p-4">Daftar Nilai Ujian Mahasiswa</h3>
        <table class="table table-light table-bordered table-striped table-hover table-sm w-75 mx-auto p-4">
            <thead class="table-dark">
                <tr>
                    <?php
                    //array judul
                    $ar_judul = ['No', 'Nim', 'Nama', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

                    foreach ($ar_judul as $judul) {
                        ?>
                        <th><?= $judul ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;
                foreach ($mahasiswa as $m) {
                    //keterangan lulus
                    $lulus = ($m['nilai'] >= 60) ? 'Lulus' : 'Gagal';

                    //penentuan grade
                    if ($m['nilai'] >= 85 && $m['nilai'] <= 100) $grade = 'A';
                    else if ($m['nilai'] >= 75 && $m['nilai'] < 85) $grade = 'B';
                    else if ($m['nilai'] >= 60 && $m['nilai'] < 75) $grade = 'C';
                    else if ($m['nilai'] >= 30 && $m['nilai'] < 60) $grade = 'D';
                    else if ($m['nilai'] >= 0 && $m['nilai'] < 30) $grade = 'E';
                    else $grade = '';

                    //tentukan predikat
                    switch($grade) {
                        case 'A':
                            $predikat = 'Memuaskan';
                            break;
                        case 'B':
                            $predikat = 'Bagus';
                            break;
                        case 'C':
                            $predikat = 'Cukup';
                            break;
                        case 'D':
                            $predikat = 'Kurang';
                            break;
                        case 'E':
                            $predikat = 'Buruk';
                            break;
                        default:
                        $predikat = '';
                    }
                    ?>
                    <tr>
                        <th class="text-center"><?= $n ?></th>
                        <td><?= $m['nama'] ?></td>
                        <td><?= $m['nim'] ?></td>
                        <td><?= $m['nilai'] ?></td>
                        <td><?= $lulus ?></td>
                        <td><?= $grade ?></td>
                        <td><?= $predikat ?></td>
                    </tr>
                <?php $n++; } ?>
            </tbody>
            <tfoot class="table-group-divider">
                <?php
                foreach ($keterangan as $ket=>$hasil) {
                    ?>
                    <tr>
                        <th colspan="6"><?= $ket ?></th>
                        <th class="text-center"><?= $hasil ?></th>
                    </tr>
                <?php } ?>
            </tfoot>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>
