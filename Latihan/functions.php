<?php 
$conn = mysqli_connect("localhost","root","","phpdasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    global $conn;
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    //upload gambar
    $gambar = upload();
    if(!$gambar) {
         return false;
    }

    $query = "INSERT INTO mahasiswa VALUES
            ('','$nama','$nrp','$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //pengecekan jika gambar belum diupload
    if($error === 4) {
        echo 
        "<script>
            alert('Upload gambar terlebih dahulu');
        </script>";
        return false;
    }

    //pengecekan hanya gambar yang boleh diupload
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo 
        "<script>
            alert('Yang anda upload bukan gambar');
        </script>";
        return false;
    }

    //jika file terlalu besar
    if($ukuranFile > 1000000) {
        "<script>
            alert('Ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    //lolos pengecekan, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function edit($data) {
    global $conn;
    $id = $data['id'];
    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);

    $gambarLama = htmlspecialchars($data["gambarLama"]);
    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE mahasiswa SET
        nrp = '$nrp',
        nama = '$nama',
        email = '$email',
        jurusan = '$jurusan',
        gambar = '$gambar'
        WHERE 
        id = '$id'
        ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM mahasiswa WHERE
            nrp LIKE '%$keyword%' OR
            nama LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";

            return query($query);
}

?>