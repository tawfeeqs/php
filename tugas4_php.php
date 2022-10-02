<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tugas 4 PHP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body style="background-color: #34568b;">
        <h3 class="text-center text-white p-4">Struktur Gaji Pegawai</h3>
        <table class="table table-light table-bordered table-striped table-hover w-75 mx-auto p-4">
            <tr class="text-center table-dark">
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Agama</th>
                <th>Status</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan Jabatan</th>
                <th>Tunjangan Keluarga</th>
                <th>Zakat Profesi</th>
                <th>Gaji Bersih</th>
            </tr>

        <?php
        class Pegawai {
            //variabel
            public $nip;
            public $nama;
            public $jabatan;
            public $agama;
            public $status;

            //konstruktor
            public function __construct ($nip, $nama, $jabatan, $agama, $status) {
                $this->nip = $nip;
                $this->nama = $nama;
                $this->jabatan = $jabatan;
                $this->agama = $agama;
                $this->status = $status;
            }

            public function setGajiPokok () {
                switch ($this->jabatan) {
                case 'Manager':
                    $this->gaPok = 15000000;
                    break;
                case 'Asmen':
                    $this->gaPok = 10000000;
                    break;
                case 'Kabag':
                    $this->gaPok = 7000000;
                    break;
                case 'Staff':
                    $this->gaPok = 4000000;
                    break;
                default:
                $this->gaPok = 0;
                }
                return $this->gaPok;
            }

            public function settunJab () {
                $this->tunJab = 0.2 * $this->gaPok;
                return $this->tunJab;
            }

            public function settunKel () {
                $this->tunKel = ($this->status == 'Menikah') ? 0.1 * $this->gaPok : 0;
                return $this->tunKel;
            }

            public function setZakatProfesi () {
                $this->zaProf = ($this->agama == 'Islam' && $this->gaPok >= 6000000) ? 0.025 * $this->gaPok : 0;
                return $this->zaProf;
            }

            public function setGajiBersih () {
                $this->thp = $this->gaPok + $this->tunJab + $this->tunKel - $this->zaProf;
                return $this->thp;
            }

            public function mencetak () { ?>
                <tr>
                    <td><?= $this->nip; ?></td>
                    <td><?= $this->nama; ?></td>
                    <td><?= $this->jabatan; ?></td>
                    <td><?= $this->agama; ?></td>
                    <td><?= $this->status; ?></td>
                    <td><?= 'Rp'.number_format($this->setGajiPokok (), 0, '', '.'); ?></td>
                    <td><?= 'Rp'.number_format($this->setTunJab (), 0, '', '.'); ?></td>
                    <td><?= 'Rp'.number_format($this->setTunKel (), 0, '', '.'); ?></td>
                    <td><?= 'Rp'.number_format($this->setZakatProfesi (), 0, '', '.'); ?></td>
                    <td><?= 'Rp'.number_format($this->setGajiBersih (), 0, '', '.'); ?></td>
                </tr>
            <?php }
        }

        //objek
        $gibson = new Pegawai ('2201', 'Gibson', 'Manager', 'Katolik', 'Menikah');
        $idham = new Pegawai ('2202', 'Idham', 'Kabag', 'Islam', 'Belum Menikah');
        $dafuk = new Pegawai ('2203', 'Dafuk', 'Asmen', 'Islam', 'Menikah');
        $jatuwl = new Pegawai ('2204', 'Jatuwl', 'Staff', 'Hindu', 'Belum Menikah');
        $taqy = new Pegawai ('2205', 'Taqy', 'Kabag', 'Protestan', 'Menikah');

        $gibson->mencetak ();
        $idham->mencetak ();
        $dafuk->mencetak ();
        $jatuwl->mencetak ();
        $taqy->mencetak ();
        ?>

        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>
