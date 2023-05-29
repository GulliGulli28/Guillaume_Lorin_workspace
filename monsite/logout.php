<?php
session_start();
$auth_token = $_COOKIE['auth_token'];
$username = $_SESSION['username'];
$query = "UPDATE users SET auth_token=NULL WHERE username='$username' AND auth_token='$auth_token'";
mysqli_query($conn, $query);
session_unset();
session_destroy();
setcookie('auth_token', '', time()-3600);
header("Location: login.php");

?>
