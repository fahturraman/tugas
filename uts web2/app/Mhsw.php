<?php
    abstract  class Peserta {
        abstract protected function tampil();
    }
 class mhsw extends Peserta {
 private $db;
 public function __construct()
     {
   try {
 $this->db = new PDO("mysql:host=localhost;dbname=data2", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM mahasiswa";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function simpan()
    {
        $sql = "insert into mahasiswa values ('','".$_GET['nim']."','".$_GET['nama']."','".$_GET['alamat']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from mahasiswa where mhsw_id='".$_GET['mhsw_id']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM mahasiswa where mhsw_id='".$_GET['mhsw_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id, $nim,$nama,$alamat)
    {
        $sql = "update mahasiswa set mhsw_nim='".$nim."', mhsw_nama='".$nama."', mhsw_alamat='".$alamat."' where mhsw_id='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($alamat){
        $sql = "SELECT * FROM mahasiswa WHERE mhsw_alamat LIKE '%".$alamat."%'
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  

 }

 class dosen extends Peserta {
    private $db;
    public function __construct()
        {
      try {
    $this->db = new PDO("mysql:host=localhost;dbname=data2", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
           }
       }
       public function tampil()
       {
           $sql = "SELECT * FROM dosen";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           $data = [];
           while ($rows = $stmt->fetch()) {
               $data[] = $rows;
               }
           return $data;
       }
   
       public function simpan()
       {
           $sql = "insert into dosen values ('','".$_GET['nip']."','".$_GET['nama']."','".$_GET['alamat']."')";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           echo "DATA BERHASIL DISIMPAN !";
       } 
   
       public function hapus()
       {
           $sqls = "delete from dosen where dosen_id='".$_GET['dosen_id']."'";
           $stmts = $this->db->prepare($sqls);
           $stmts->execute();
           echo "DATA BERHASIL DIHAPUS !";
       }      
       public function tampil_update()
       {
           $sql = "SELECT * FROM dosen where dosen_id='".$_GET['dosen_id']."'";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           $data = [];
           while ($rows = $stmt->fetch()) {
               $data[] = $rows;
               }
           return $data;
       }
       public function update($id,$nip,$nama,$alamat)
       {
           $sql = "update dosen set dosen_nim='".$nim."', dosen_nama='".$nama."', dosen_alamat='".$alamat."' where dosen_id='".$id."'";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           echo "DATA BERHASIL DIUPDATE !";
       } 
       public function cari($alamat){
           $sql = "SELECT * FROM dosen WHERE dosen_alamat LIKE '%".$alamat."%'
           ";
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           $data = [];
           while ($rows = $stmt->fetch()) {
               $data[] = $rows;
               }
           return $data;
       }  
   
    }

 class prodi extends Peserta {
 private $db;
 public function __construct()
     {
   try {
 $this->db = new PDO("mysql:host=localhost;dbname=data2", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM prodi where id_prodi ='".$_GET['mhsw_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function tampildosen()
    {
        $sql = "SELECT * FROM prodi where id_dosen ='".$_GET['id_dosen']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function simpan()
    {
        $sql = "insert into jurusan values ('','".$_GET['prodi']."','".$_GET['mhsw_id']."',null)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 
    public function simpandosen()
    {
        $sql = "insert into mahasiswa values ('','".$_GET['prodi']."',null,'".$_GET['dosen_id']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from mahasiswa where id='".$_GET['id_prodi']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM mahasiswa where mhsw_id='".$_GET['id_prodi']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($prodi, $id)
    {
        $sql = "update prodi set prodi='".$prodi."' where id='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($alamat){
        $sql = "SELECT * FROM mahasiswa WHERE mhsw_alamat LIKE '%".$alamat."%'
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  
 }
 class semester extends Peserta {
 private $db;
 public function __construct()
     {
   try {
 $this->db = new PDO("mysql:host=localhost;dbname=data2", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM semester where id_mahasiswa ='".$_GET['mhsw_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function tampildosen()
    {
        $sql = "SELECT * FROM semester where id_prodi ='".$_GET['id_prodi']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function simpan()
    {
        $sql = "insert into semester values ('','".$_GET['semester']."','".$_GET['id']."',null)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 
    public function simpandosen()
    {
        $sql = "insert into mahasiswa values ('','".$_GET['jurusan']."',null,'".$_GET['id_jurusan']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from mahasiswa where id='".$_GET['id_jurusan']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM mahasiswa where mhsw_id='".$_GET['id_jurusan']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($jurusan, $id)
    {
        $sql = "update jurusan set jurusan='".$jurusan."' where id='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($alamat){
        $sql = "SELECT * FROM mahasiswa WHERE mhsw_alamat LIKE '%".$alamat."%'
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  

 }