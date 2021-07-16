<?php 
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

if ( isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Latihan PHP Dasar</title>
    <style>
        th {
            background-color: lightblue;
        }
        .input-cari {
            border: 1px solid #fff;
        }
    </style>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br><br>
    <form action="" method="POST">
        <input type="text" name="keyword" size="30" autofocus placeholder="cari data mahasiswa" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Actions</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($mahasiswa as $mhs) : ?>
        <tr>
            <td><?= $i ?></td>
            <td>
                <a href="edit.php?id=<?= $mhs['id']?>">Edit</a> | 
                <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="confirm('Yakin mau menghapus data ini ?');">Hapus</a>
            </td>
            <td><img src="img/<?= $mhs["gambar"]; ?>" width="50"></td>
            <td><?= $mhs["nrp"] ?></td>
            <td><?= $mhs["nama"] ?></td>
            <td><?= $mhs["email"] ?></td>
            <td><?= $mhs["jurusan"] ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach ?>
    </table>
</body>
</html>