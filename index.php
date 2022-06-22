<?php
// koneksi database

// session_start();

// if (isset($_COOKIE['login'])) {
//     $_SESSION['login'] = true;
// }

// if (!isset($_SESSION['login'])) {
//     header('Location: login.php');
//     exit;
// }

require_once 'koneksi.php';

$jumlahdata = 2;
// cara yang pertama ;
// $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
// $jumlahdatamysqli = mysqli_num_rows($result);
// cara kedua ;
$jumlahdatamysqli = count(query("SELECT * FROM mahasiswa"));
$jumlahhalaman = ceil($jumlahdatamysqli / $jumlahdata);
// buat halaman ;
// if (isset($_GET['halaman'])) {
// $halamanaktif = $_GET['halaman'];
// } else {
// $halamanaktif = 1;
// }
$halamanaktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

$halamanawal = ($jumlahdata * $halamanaktif) - $jumlahdata;

// cara membulatkan bilangan pecahan atau float:
// 1. function round yaitu membulatkan ke bilangan terdekat
// 2. function floor yaitu membulatkan ke bilangan yang dibawah
// 3. function ceil yaitu membulatkan ke bilangan diatasnya

$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC LIMIT $halamanawal,$jumlahdata");

// untuk limit butuh 2 nilai setelahnya ,yaitu ; nilai pertama adalah data yang di ambil mulai dari mana(dimulai dari 0),
// dan nilai yang kedua adalah berapa data yang ingin diambil
// ASC adalah menurutkan data dari kecil ke besar
// DESC adalah menurutkan data dari besar ke kecil

if (isset($_POST['cari'])) {

    $mahasiswa = cari($_POST['keyword']);

    if (isset($_GET['halaman'])) {
        $_GET['halaman'] = 1;
    }

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
    <style>
    @media print {

        .tambah,
        .logout,
        .cari,
        tr>.aksi {
            display: none;
        }
    }
    </style>

</head>

<body>
    <h1>DAFTAR MAHASISWA</h1>

    <a href="tambah.php" class="tambah">tambah data mahasiswa</a><br><br>


    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian" autocomplete="off"
            id="keyword" class="cari">

        <button type="submit" name="cari" id="tombol-cari" class="cari">cari!</button>
    </form><br>





    <?php if ($halamanaktif > 1): ?>
    <a href="?halaman=<?=$halamanaktif - 1?>">&laquo;</a>
    <?php endif;?>


    <?php for ($i = 1; $i <= $jumlahhalaman; $i++): ?>

    <?php if ($i == $halamanaktif): ?>
    <a href="?halaman=<?=$i?>" style="font-weight:bold; color:red;"><?=$i?></a>
    <?php else: ?>
    <a href="?halaman=<?=$i?>"><?=$i?></a>
    <?php endif;?>

    <?php endfor;?>

    <?php if ($halamanaktif < $jumlahhalaman): ?>
    <a href="?halaman=<?=$halamanaktif + 1?>">&raquo;</a>
    <?php endif;?>

    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th class="aksi">Aksi</th>
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
                <td class="aksi">
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
    </div>

    <a href="./logout.php" class="logout"> logout /keluar</a>

    <script src="js/script.js"></script>
</body>



</html>