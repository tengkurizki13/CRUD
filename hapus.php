<?php

require 'koneksi.php';

$id = $_GET['id'];

if (hapus($id) > 0) {
    echo "<script>
    alert('okee berhasil dihapus brooo');
    document.location.href = 'http://localhost/sandhika_Mysql/';
    </script>";
}

?>