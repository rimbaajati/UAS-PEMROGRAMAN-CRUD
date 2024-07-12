<?php
include 'config.php';

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$sql = "UPDATE simgeo_dasar SET lokasi='$lokasi', deskripsi='$deskripsi', lintang='$lintang', bujur='$bujur' WHERE id=$id";
if ($koneksi->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
?>
