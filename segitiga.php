<?php
require_once "Bentuk2D.php";

class Segitiga extends Bentuk2D {
    public $alas;
    public $tinggi;

    public function __construct ($a, $t) {
        $this->alas = $a;
        $this->tinggi = $t;
    }

    public function namaBidang () {
        echo "Segitiga";
    }

    public function keterangan () {
        echo "a = ".$this->alas." cm<br>";
        echo "t = ".$this->tinggi." cm<br>";
        echo "<b>c = ".sqrt((pow($this->alas, 2)) + (pow($this->tinggi, 2)))." cm</b>";
    }

    public function luasBidang () {
        $this->luasSegitiga = 0.5 * $this->alas * $this->tinggi;
        return $this->luasSegitiga." cm<sup>2";
    }

    public function kelilingBidang () {
        $this->kelilingSegitiga = $this->alas + $this->tinggi + sqrt((pow($this->alas, 2)) + (pow($this->tinggi, 2)));
        return $this->kelilingSegitiga." cm";
    }
}
?>