<?php
 class Mahasiswa {
 public string $nim;
 public string $nama;
 public static string $jeniskelamin = "laki-laki";
 public static string $agama = "Islam";
 public function setNim(string $nim) {
 return $nim;
 }

 public function setNama(string $b) {
 // $this keyword refers a non-static member of a class
 return $this->nama = $b;
 }

 public function getNama() {
 // $this keyword refers a non-static member of a class
 return $this->nama;
 }

 public static function getAgama() {
 // self keyword refers a static member of a class
 return self::$agama;
 }

 public static function getjeniskelamin() {
    // self keyword refers a static member of a class
    return self::$jeniskelamin;
    }
 }
// Instantiation
$mhsw = new Mahasiswa();
 echo $mhsw->setNim('17021000');
 $mhsw->setNama('Faiza');
 echo $mhsw->getNama();
 echo $mhsw->getAgama();
 echo $mhsw->getjeniskelamin();