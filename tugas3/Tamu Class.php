<?php
2.
3. class Fakultas {
4.
5. public string $nama;
6.
7. public function __construct(string $a) {
8. $this ->nama = $a;
}
}
class prodi {
    public static function setNama(string $b) {
    return $b;
}
}
class Mahasiswa {
public static function getFakultas() {
$fak = new Fakultas("FST");
return $fak->nama;
}
public static function getProdi() {
return Prodi::setNama("Sistem Informasi");
}
}
 // $fak = new Fakultas("FST");
// echo $fak->nama;
// echo Prodi::setNama("Sistem Informasi");
echo Mahasiswa::getFakultas() . " "
Mahasiswa::getProdi();
