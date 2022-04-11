<?php
// koneksi database

require_once 'koneksi.php';

$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");

// ASC adalah menurutkan data dari kecil ke besar
// DESC adalah menurutkan data dari besar ke kecil

if (isset($_POST['cari'])) {

    $mahasiswa = cari($_POST['keyword']);

    // dolar mahasiswanya ditimpas

}

// ambil data dari database / query dari database

// agar bisa mengecek apakah data di database itu benar dengan menyimpan di variabel

// var_dump($result);

// ambil data dari mahasiswa disebut jg dengan = ( fetch), ada 4 cara untuk ,mengambil data:
// 1. mysqli_fetch_row() // mengembalikan array numerik
// 2. mysqli_fetch_assoc() // mengembalikan array assosiative
// 3. mysqli_fetch_array() // mengembalikan keduanya
// 4. mysqli_fetch_object() // klw object dipanggil dengan tanda ( ->)
// 5. mysqli_fetch_all // menampilkan semua data

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
    <h1>DAFTAR MAHASISWA</h1>

    <a href="tambah.php">tambah data mahasiswa</a><br><br>


    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian"
            autocomplete="off">
        <button type="submit" name="cari">cari!</button>
    </form><br>

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
        <?php $no = 1;?>
        <?php foreach ($mahasiswa as $row): ?>
        <tr>
            <td><?=$no?></td>
            <td>
                <a href="./ubah.php?id=<?=$row['id']?>">ubah</a> |
                <a href="./hapus.php?id=<?=$row['id']?>" onclick="return confirm('yakin')">hapus</a>
            </td>
            <td>
                <img src="./assets/images/<?=$row['gambar']?>" width="70" height="50" alt="">
            </td>
            <td><?=$row['nrp']?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['jurusan']?></td>
        </tr>
        <?php $no++?>

        <?php endforeach;?>
    </table>
</body>

</html>