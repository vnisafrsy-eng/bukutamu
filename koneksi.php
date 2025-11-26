<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "db_bukutamu";

$koneksi = new Mysqli($host, $user, $password, $db);

if($koneksi->connect_error)
{
    die("Koneksi gagal: " . $koneksi->connect_error);
}

?>