<?php

require_once './koneksi.php';

if (isset($_POST['register'])) {

    if (register($_POST) > 0) {
        echo "<script>
    alert('data berhasil ditambahkan');
    </script>";
    } else {
        mysqli_error($koneksi);
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <style>
    label {
        display: block;
    }
    </style>
</head>

<body>

    <h1>register / pendaftaran</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
        </ul>
        <ul>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li>
        </ul>
        <ul>
            <li>
                <label for="password2">konfirmasi password :</label>
                <input type="password" name="password2" id="password2">
            </li>
        </ul>
        <ul>
            <button type="submit" name="register">daftar</button>
        </ul>

    </form>

</body>

</html>