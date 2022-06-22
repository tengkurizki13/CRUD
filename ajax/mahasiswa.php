<?php

require '../koneksi.php';

$keyword = $_GET['keyword'];
$query = "SELECT * FROM mahasiswa
WHERE name LIKE '%$keyword%' OR
nrp LIKE '%$keyword%' OR
email LIKE '%$keyword%' OR
jurusan LIKE '%$keyword%'
";

$mahasiswa = query($query);
?>

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