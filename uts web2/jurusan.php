<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Data Mahasiswa</title>
</head>
<body>
<?php

require_once "app/Mhsw.php";
$semester = new semester();
$rows = $semester->tampil();

if(isset($_GET["cari"])){
    $rows = $semester->cari($_GET["semester"]);
}

if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id_semester'])) $vid =$_GET['id_semester'];
else $vid ='';
if(isset($_GET['semester'])) $vsemester =$_GET['semester'];
else $vsemester ='';

if($vsimpan=='simpan' && ($semester <>'')){
    $semester->simpan();
    $rows = $semester->tampil();
    $vid ='';
    $vsemester ='';
}

if($vaksi=="hapus")  {
    $semester->hapus();
    $rows = $semester->tampil();
}
if($vaksi=="cari")  {
    $rows = $semester->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $semester->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['semester_id'];
        $vsemester = $row['semester_nim'];
    }
 }

if ($vupdate=="update"){
    $semester->update($vid,$vnim,$vnama,$valamat);
    $rows = $semester->tampil();
    $vid ='';
    $vsemester ='';
}
if ($vreset=="reset"){
    $vid ='';
    $vsemester ='';
}


?>

<form action="?" method="get">
<table cellspacing="20">
    <tr><td>semester</td><td>:</td><td>
        <input type="hidden" name="id" value="<?php echo $vid; ?>" />
        <input type="text" name="semester" value="<?php echo $vsemester; ?>" /></td></tr>
    <tr><td></td><td></td><td>
    <input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/>
    <input type="submit" name='reset' value="reset"/>
    <input type="submit" name='cari' value="cari"/>
    </td></tr>
</table>
</form>

    <table border="1" cellpadding="10" cellspacing="0" style="text-align:center">
    <tr>
        <th>NO</th>
        <th>semester</th>
        <th>AKSI</th>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_prodi']; ?></td>
            <td><?php echo $row['jurusan']; ?></td>
            <td><a href="?id_prodi=<?php echo $row['id_prodi']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id_prodi=<?php echo $row['id_prodi']; ?>&aksi=lihat_update">Update</a>
                &nbsp;&nbsp;&nbsp;</td>

        </tr>
    <?php } ?>
 </table>
</body>
</html>