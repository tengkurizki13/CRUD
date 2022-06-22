<?php
require_once 'koneksi.php';
session_start();

if (isset($_COOKIE['id']) && isset($_COOKIE['username'])) {
    $id = $_COOKIE['id'];
    $username = $_COOKIE['username'];

    $result = mysqli_query($koneksi, "SELECT username FROM users WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);

    if ($username === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }

}

if (isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username ='$username'");
    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {

            $_SESSION['login'] = true;
            if (isset($_POST['remember'])) {
                setcookie('id', $row['id'], time() + 60);
                setcookie('username', hash('sha256', $row['username']), time() + 60);
            }

            header('Location: index.php');
            exit;
        }
    }

    $error = true;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman login</title>
</head>

<body>

    <?php if (isset($error)): ?>
    <p style="color: red; font-style:italic">login gagal bro</p>

    <?php endif;?>

    <h1>halaman login</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">remember me</label>
            </li>
            <li>
                <button type="submit" name="submit">login </button>
            </li>

        </ul>


    </form>

</body>

</html>