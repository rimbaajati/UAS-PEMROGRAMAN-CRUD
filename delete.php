<?php
include 'config.php';
$id = $_GET['id'];

$sql = "DELETE FROM simgeo_dasar WHERE id=$id";
if ($koneksi->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
?>
