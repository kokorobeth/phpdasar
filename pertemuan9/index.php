<?php
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <form method="post">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Gabar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $baris) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <a href="">Ubah</a> ||
                        <a href="">Hapus</a>
                    </td>
                    <td><img src="img/<?= $baris["gambar"]; ?>" alt=""></td>
                    <td><?= $baris["nrp"]; ?></td>
                    <td><?= $baris["nama"]; ?></td>
                    <td><?= $baris["email"]; ?></td>
                    <td><?= $baris["jurusan"]; ?></td>
                </tr>

                <?php $i++ ?>
            <?php endforeach; ?>
        </table>
    </form>
</body>

</html>