<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

//jika tombol cari di klik
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>Daftar mahasiswa</h1>

    <a href="tambah.php">Tambah data Mahasiswa</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="35" autofocus placeholder="masukan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"] ?>">Ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin mau menghapus data ini ?');">Hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
                <td><?= $row["nrp"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>

    </table>
</body>

</html>