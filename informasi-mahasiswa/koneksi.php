<?php
$host = "localhost:3306";
$user = "root";
$pass = "";
$db   = "informasi_siswa";

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

$koneksi->set_charset("utf8");
?>