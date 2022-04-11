<?php

include 'koneksi.php';

$id = $_GET['id'];

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id ")[0];

if (isset($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
    alert('okee berhasil ddiubah');
    document.location.href = 'http://localhost/sandhika_Mysql/';
    </script>";
    } else {
        echo "<script>
    alert('yahh gagal')
    </script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah</title>
</head>

<body>
    <h1>ubah data mahasiswa</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?=$mhs['id']?>">
        <ul>
            <li>
                <label for="nrp">NRP :</label>
                <input type="text" name="nrp" id="nrp" required value="<?=$mhs['nrp']?>">
            </li>
        </ul>
        <ul>
            <li>
                <label for="name">Name :</label>
                <input type="text" name="name" id="name" value="<?=$mhs['name']?>">
            </li>
        </ul>
        <ul>
            <li>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" value="<?=$mhs['email']?>">
            </li>
        </ul>
        <ul>
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" value="<?=$mhs['jurusan']?>">
            </li>
        </ul>
        <ul>
            <li>
                <label for="gambar">gambar :</label>
                <input type="text" name="gambar" id="gambar" value="<?=$mhs['gambar']?>">
            </li>
        </ul>
        <ul>
            <li>
                <button type="submit" name="submit">ubah</button>
            </li>
        </ul>
    </form>
</body>

</html>