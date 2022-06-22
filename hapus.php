<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require 'koneksi.php';

$id = $_GET['id'];

if (hapus($id) > 0) {
    echo "<script>
    alert('okee berhasil dihapus brooo');
    document.location.href = 'http://localhost/sandhika_Mysql/';
    </script>";
}