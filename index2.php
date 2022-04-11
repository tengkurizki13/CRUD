<?php
// koneksi database

$koneksi = mysqli_connect("localhost","root","","belajar_sandhika");

// ambil data dari database / query dari database

// agar bisa mengecek apakah data di database itu benar dengan menyimpan di variabel
$result = mysqli_query($koneksi,"SELECT * FROM mahasiswa");

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
        <?= $no = 1;?>
        <?php while( $row = mysqli_fetch_assoc($result)) :  ?>
        <tr>
            <td><?= $no ?></td>
            <td>
                <a href="">ubah</a> |
                <a href="">hapus</a>
            </td>
            <td>
                <img src="./assets/images/<?= $row['gambar']?>" width="70" alt="">
            </td>
            <td><?= $row['nrp']  ?></td>
            <td><?= $row['name']  ?></td>
            <td><?= $row['email']  ?></td>
            <td><?= $row['jurusan']  ?></td>
        </tr>
        <?= $no++ ?>
        <?php endwhile;?>
    </table>
</body>

</html>