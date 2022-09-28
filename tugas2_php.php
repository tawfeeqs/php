<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tugas 2 PHP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body>
        <div class="container px-5 my-5">
            <form id="cForm" data-sb-form-api-token="API_TOKEN" method="post">
                <div class="form-floating mb-3">
                    <input class="form-control" name="nama" type="text" placeholder="Nama" required />
                    <label for="nama">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="agama" aria-label="Agama" required>
                        <option value="Islam">Islam</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                    </select>
                    <label for="agama">Agama</label>
                </div>
                <div class="mb-3">
                    <label class="form-label d-block">Jabatan</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="manager" value="Manager" type="radio" name="jabatan" required />
                        <label class="form-check-label" for="manager">Manager</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="asisten" value="Asisten" type="radio" name="jabatan" required />
                        <label class="form-check-label" for="asisten">Asisten</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="kabag" value="Kabag" type="radio" name="jabatan" required />
                        <label class="form-check-label" for="kabag">Kabag</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="staff" value="Staff" type="radio" name="jabatan" required />
                        <label class="form-check-label" for="staff">Staff</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label d-block">Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="menikah" value="Menikah" type="radio" name="status" required />
                        <label class="form-check-label" for="menikah">Menikah</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="belumMenikah" value="Belum Menikah" type="radio" name="status" required />
                        <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="jumlahAnak" type="text" placeholder="Jumlah Anak" required />
                    <label for="jumlahAnak">Jumlah Anak</label>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg" name="simpan" type="submit">Submit</button>
                </div>
            </form>
        </div>

        <?php
        error_reporting(0);

            //tangkap request
            $nama = $_POST['nama'];
            $agama = $_POST['agama'];
            $jabatan = $_POST['jabatan'];
            $status = $_POST['status'];
            $jAnak = $_POST['jumlahAnak'];
            $tombol = $_POST['simpan'];

            //menentukan gaji pokok berdasarkan jabatan
            switch ($jabatan) {
                case 'Manager': $gaPok = 20000000; break;
                case 'Asisten': $gaPok = 15000000; break;
                case 'Kabag': $gaPok = 10000000; break;
                case 'Staff': $gaPok = 4000000; break;
                default: $gaPok = '';
            }

            //menentukan tunjangan jabatan
            $tunJab = 0.2 * $gaPok;

            //menentukan tunjangan keluarga berdasarkan status dan jumlah anak
            if ($status == 'Menikah' && $jAnak <= 2) {
                $tunGa = 0.05 * $gaPok;
            } else if ($status == 'Menikah' && $jAnak >= 3 && $jAnak >= 5) {
                $tunGa = 0.1 * $gaPok;
            } else if ($status == 'Menikah' && $jAnak > 5) {
                $tunGa = 0.15 * $gaPok;
            } else {
                $tunGa = 0;
            }

            //menentukan gaji kotor
            $gaKot = $gaPok + $tunJab + $tunGa;

            //menentukan zakat profesi
            $zaProf = ($agama == 'Islam' && $gaKot >= 6000000) ? 0.025 * $gaKot : 0;

            //menentukan take home pay
            $thp = $gaKot - $zaProf;
            
            if(isset($tombol)) { ?>
            <div class="card" style="width:100%;">
                <div class="body">
                    <div class=" alert alert-primary p-5" role="alert">
                        <table class="table table-bordered table-light table-striped w-50 mx-auto">
                            <tr>
                                <td><b>Nama</b></td>
                                <td><?= $nama ?></td>
                            </tr>
                            <tr>
                                <td><b>Agama</b></td>
                                <td><?= $agama ?></td>
                            </tr>
                            <tr>
                                <td><b>jabatan<b></td>
                                <td><?= $jabatan ?></td>
                            </tr>
                            <tr>
                                <td><b>Status</b></td>
                                <td><?= $status ?></td>
                            </tr>
                            <tr>
                                <td><b>Jumlah Anak</b></td>
                                <td><?= $jAnak ?></td>
                            </tr>
                            <tr>
                                <td><b>Gaji Pokok</b></td>
                                <td><?= number_format($gaPok, 2, ',', '.');  ?></td>
                            </tr>
                            <tr>
                                <td><b>Tunjangan Jabatan</b></td>
                                <td><?= number_format($tunJab, 2, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td><b>Tunjangan Keluarga</b></td>
                                <td><?= number_format($tunGa, 2, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td><b>Gaji Kotor</b></td>
                                <td><?= number_format($gaKot, 2, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td><b>Zakat Profesi</b></td>
                                <td><?= number_format($zaProf, 2, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td><b><i>Take Home Pay</i></b></td>
                                <td><?= number_format($thp, 2, ',', '.'); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>
