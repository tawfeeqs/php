<?php
require_once "Bentuk2D.php";

class Lingkaran extends Bentuk2D {
    public $jari2;

    public function __construct ($r) {
        $this->jari2 = $r;
    }

    public function namaBidang () {
        echo "Lingkaran";
    }

    public function keterangan () {
        echo "r = ".$this->jari2." cm";
    }

    public function luasBidang () {
        $this->luasLingkaran = 3.14 * $this->jari2 * $this->jari2;
        echo $this->luasLingkaran." cm<sup>2";
    }

    public function kelilingBidang () {
        $this->kelilingLingkaran = 2 * 3.14 * $this->jari2;
        echo $this->kelilingLingkaran." cm";
    }
}
?>