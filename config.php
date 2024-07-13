<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "sim_geografis";

$koneksi = new mysqli($host, $username, $password, $db);

if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

?>
