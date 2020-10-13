<?php
session_start();
$_SESSION['login'] = false;
$_SESSION['isadmin'] = false;
header("Location:../index.php");
?>