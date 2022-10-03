<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tugas 5 PHP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body style="background-color: #34568b;">
        <h3 class="text-center text-white p-4">Data-Data Bidang</h3>
        <?php
        require_once "lingkaran.php";
        require_once "persegiPanjang.php";
        require_once "segitiga.php";

        $cir = new Lingkaran (10);
        $rec = new persegiPanjang (5, 10);
        $tri = new Segitiga (6, 8);

        $dataBidang = [$cir, $rec, $tri]; ?>

        <table class="table table-light table-bordered table-striped table-hover table-sm w-50 mx-auto p-4 text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <?php
                    //array judul
                    $arr_judul = ["No", "Nama Bidang", "Keterangan", "Luas Bidang", "Keliling Bidang"];

                    foreach ($arr_judul as $judul) {
                        ?>
                        <th><?= $judul ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;

                foreach ($dataBidang as $bidang) { ?>
                    <tr>
                        <th><?= $n++ ?></th>
                        <td><?= $bidang->namaBidang () ?></td>
                        <td><?= $bidang->keterangan () ?></td>
                        <td><?= $bidang->luasBidang () ?></td>
                        <td><?= $bidang->kelilingBidang () ?></td>
                    </tr>
                <?php } ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>