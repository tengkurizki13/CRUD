<?php
    
  include 'koneksi.php';

if (isset($_POST["submit"])) {


if (tambah($_POST) > 0) {
    echo "<script>
    alert('okee berhasil');
    document.location.href = 'http://localhost/sandhika_Mysql/';
    </script>";
}else{
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
    <h1>tambah data mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nrp">NRP :</label>
                <input type="text" name="nrp" id="nrp" required>
            </li>
        </ul>
        <ul>
            <li>
                <label for="name">Name :</label>
                <input type="text" name="name" id="name">
            </li>
        </ul>
        <ul>
            <li>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email">
            </li>
        </ul>
        <ul>
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
        </ul>
        <ul>
            <li>
                <label for="gambar">gambar :</label>
                <input type="text" name="gambar" id="gambar">
            </li>
        </ul>
        <ul>
            <li>
                <button type="submit" name="submit">tambah</button>
            </li>
        </ul>
    </form>
</body>

</html>