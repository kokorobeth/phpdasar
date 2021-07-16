<?php require_once('functions.php') ?>

<?php 
if(isset($_POST['submit'])) {
    if(tambah($_POST) > 0) {
        echo
        "<script>
            alert('Data Berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo
        "<script>
            alert('Gagal Untuk ditambahkan');
            document.location.href = 'index.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambahkan Data</h1>
    <a href="index.php">Kembali</a>
    <br><br>
    <form action="" method="post" enctype="multipart/form-data">
    <table border="0" cellpadding="10" cellspacing="0">
        <tr>
            <td><label for="nrp">NRP</label></td>
            <td><input type="text" name="nrp" id="nrp" autocomplete="off"></td>
        </tr>
        <tr>
            <td><label for="nama">Nama</label></td>
            <td><input type="text" name="nama" id="nama" autocomplete="off"></td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="text" name="email" id="email" autocomplete="off"></td>
        </tr>
        <tr>
            <td><label for="jurusan">Jurusan</label></td>
            <td><input type="text" name="jurusan" id="jurusan" autocomplete="off"></td>
        </tr>
        <tr>
            <td><label for="gambar">Gambar</label></td>
            <td><input type="file" name="gambar" id="gambar"></td>
        </tr>
    </table>
    <br><br>
    <button type="submit" name="submit">Tambah</button>
    </form>
    
</body>
</html>