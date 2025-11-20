<?php
// MODUL 16 & 17
session_start();
session_destroy();
$_SESSION['success'] = "Logout berhasil!";
header("Location: login.php");
exit;
?>