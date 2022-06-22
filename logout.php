<?php

session_start();

$_SESSION = [];
unset($_SESSION);
session_unset();
session_destroy();

setcookie('id', '', time() - 3600);
setcookie('username', '', time() - 3600);

header('Location: login.php');
exit;