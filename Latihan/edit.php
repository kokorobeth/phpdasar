<?php 

require 'functions.php';

//ambil data dari URL
$id = $_GET["id"];

//query mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if(isset($_POST['submit'])) {
    if(edit($_POST) > 0) {
        echo
        "<script>
            alert('Data Berhasil diedit!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo
        "<script>
            alert('Gagal Untuk diedit');
            document.location.href = 'index.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit data</title>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    <a href="index.php">Kembali</a>
    <br><br>
    <form action="" method="post" enctype="multipart/form-data">
    <table border="0" cellpadding="10" cellspacing="0">
        <tr>
            <td><input type="hidden" name="id" id="id" value=<?= $mhs['id']?>></td>
        </tr>
        <tr>
            <td><input type="hidden" name="gambarLama" id="id" value=<?= $mhs['gambar']?>></td>
        </tr>
        <tr>
            <td><label for="nrp">NRP</label></td>
            <td><input type="text" name="nrp" id="nrp" required value=<?= $mhs['nrp']?>></td>
        </tr>
        <tr>
            <td><label for="nama">Nama</label></td>
            <td><input type="text" name="nama" id="name" value=<?= $mhs['nama']?>></td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="text" name="email" id="email" value=<?= $mhs['email']?>></td>
        </tr>
        <tr>
            <td><label for="jurusan">Jurusan</label></td>
            <td><input type="text" name="jurusan" id="jurusan" value=<?= $mhs['jurusan']?>></td>
        </tr>
        <tr>
            <td><label for="gambar">Gambar</label></td>
            <td><img src="img/<?= $mhs['gambar'] ?>" width="50"></td>
            <td><input type="file" name="gambar" id="gambar"</td>
        </tr>
    </table>
    <br><br>
    <button type="submit" name="submit">Edit</button>
    </form>
    
</body>
</html>