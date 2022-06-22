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

    // uplaod gambar dlu
    $gambar = upload();

    $query = "INSERT INTO `mahasiswa`( `nrp`, `name`, `email`, `jurusan`, `gambar`) VALUES ('" . $nrp . "','" . $name . "','" . $email . "','" . $jurusan . "','" . $gambar . "')";

    $result = mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);

}

function upload()
{

    $nameFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $errorFile = $_FILES['gambar']['error'];
    $tmpFile = $_FILES['gambar']['tmp_name'];

    if ($errorFile === 4) {
        echo "<script>
            alert('pilih gambar dlu bro');
            </script>";

        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $exGambar = explode('.', $nameFile);
    $exGambar = strtolower($exGambar[1]); // bisa jg pakai  fuction end() untuk mengambil element terakhir

    if (!in_array($exGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar');
        </script>";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    $terupload = move_uploaded_file($tmpFile, __DIR__ . '/assets/images/' . $nameFile);
    // var_dump($tmpFile);
    // var_dump($nameFile);
    // echo "<pre>" . print_r([
    //     "koneksi.php - 74",
    //     $terupload,
    // ], 1) . "</pre>";
    if ($terupload) {
        echo "Upload berhasil!<br/>";
        // echo "Link: <a href='" . "/assets/images/" . "'>" . $nameFile . "</a>";
    } else {
        echo "Upload Gagal!";
    }
    return $nameFile;

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

function register($data)
{
    global $koneksi;
    $username = htmlspecialchars(strtolower(stripslashes($data['username'])));
    $password = mysqli_real_escape_string($koneksi, $data['password']);
    $password2 = mysqli_real_escape_string($koneksi, $data['password2']);

    // cek konfirmasi

    if ($password !== $password2) {
        echo "<script>
        alert('konfirmasi password salah')
        </script>";
        return false;
    }

    // cek username sudah ada atau belum
    $cek = mysqli_query($koneksi, "SELECT * FROM `users` WHERE username='$username'");
    $q = mysqli_num_rows($cek);

    if ($q > 0) {
        echo "<script>
    alert('usrname udh ada bro');
    </script>";
        return false;
    }

    // return 1;

    // enkripsi password

    $password = password_hash($password, PASSWORD_DEFAULT);
    // $password = md5($password);

    mysqli_query($koneksi, "INSERT INTO `users`(`username`, `password`) VALUES ('$username','$password')");

    return mysqli_affected_rows($koneksi);

}