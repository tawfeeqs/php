<?php
require_once "Bentuk2D.php";

class persegiPanjang extends Bentuk2D {
    public $panjang;
    public $lebar;

    public function __construct ($p, $l) {
        $this->panjang = $p;
        $this->lebar = $l;
    }

    public function namaBidang () {
        echo "Persegi Panjang";
    }

    public function keterangan () {
        echo "p = ".$this->panjang." cm<br>";
        echo "l = ".$this->lebar." cm";
    }

    public function luasBidang () {
        $this->luasPersegiPanjang = $this->panjang * $this->lebar;
        echo $this->luasPersegiPanjang." cm<sup>2";
    }

    public function kelilingBidang () {
        $this->kelilingPersegiPanjang = 2 * ($this->panjang + $this->lebar);
        echo $this->kelilingPersegiPanjang." cm";
    }
}
?>