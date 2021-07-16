<?php
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

//jika tombol cari di klik
if(isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
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
    <h1>Data Mahasiswa</h1>
    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br><br>

    <form action="" method="POST">
        <input type="text" name="keyword" size="30" autofocus placeholder="cari data mahasiswa" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    <br><br>
    <form action="" method="post">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Action</th>
                <th>Gambar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>jurusan</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $mhs) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $mhs["id"]; ?>">Update</a>
                        <a href="hapus.php?id=<?php echo $mhs["id"]; ?>" onclick=" return confirm('yakin mau hapus data ini ?');">Delete</a>
                    </td>
                    <td><img src="img/<?= $mhs["gambar"]; ?>" width="70" alt=""></td>
                    <td><?= $mhs["nrp"]; ?></td>
                    <td><?= $mhs["nama"]; ?></td>
                    <td><?= $mhs["email"]; ?></td>
                    <td><?= $mhs["jurusan"]; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </form>
</body>

</html>