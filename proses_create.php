<?php
include 'config.php';

// Ambil data dari form
$lokasi = $_POST['lokasi'];
$lintang = $_POST['lintang'];
$bujur = $_POST['bujur'];
$deskripsi = $_POST['deskripsi'];

// Pastikan untuk menyebutkan nama kolom secara eksplisit
$sql = "INSERT INTO simgeo_dasar (lokasi, lintang, bujur, deskripsi) VALUES ('$lokasi', '$lintang', '$bujur', '$deskripsi')";

if ($koneksi->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
