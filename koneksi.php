<?php

$koneksi = mysqli_connect("localhost", "root", "", "belajar_sandhika");

function query($tampung)
{

    global $koneksi;
    $result = mysqli_query($koneksi, $tampung);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data)
{
    global $koneksi;
    $nrp = htmlspecialchars($data['nrp']);
    $name = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);

    $query = "INSERT INTO `mahasiswa`( `nrp`, `name`, `email`, `jurusan`, `gambar`) VALUES ('" . $nrp . "','" . $name . "','" . $email . "','" . $jurusan . "','" . $gambar . "')";

    $result = mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);

}

function hapus($id)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($koneksi);
}

function ubah($data)
{
    global $koneksi;

    $id = $data['id'];
    $nrp = htmlspecialchars($data['nrp']);
    $name = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);

    $query = "UPDATE `mahasiswa` SET `nrp`='$nrp',`name`='$name',`email`='$email',`jurusan`='$jurusan',`gambar`='$gambar' WHERE id= $id";

    $result = mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);

}

function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa
        WHERE name LIKE '%$keyword%' OR
        nrp LIKE '%$keyword%' OR
        email LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%'
        ";

    return query($query);
}