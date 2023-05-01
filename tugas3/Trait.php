<?php

trait Fakultas {

    // Boleh juga ada property

    public function setFakultas(string $a){
        return $a;
    }
}

trait prodi {
    
    // Boleh juga ada property

    public function setProdi(string $b){
        return $b;
    }
}

class Mahasiswa {

    use Fakultas, Prodi;
    public string $nama;

    public function setNama(string $c){
        $this->nama = $c;
    }
}
$mhsw = new Mahasiswa();
$mhsw->setNama("Fahtur");
echo $mhsw->setFakultas("Ilmu Komputer"). " "
. $mhsw->setProdi("Sistem informasi"). " "
. $mhsw->nama;