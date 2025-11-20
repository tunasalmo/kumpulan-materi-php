<?php 
    $username = "root";
    $password = "";
    $host = "localhost";
    $database = "db_tugas10";

    $koneksi = mysqli_connect($host, $username, $password, $database);
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>