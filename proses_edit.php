<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'], $_POST['nama_lokasi'], $_POST['lintang_dari'], $_POST['bujur_dari'])) {
        $id = mysqli_real_escape_string($koneksi, $_POST['id']);
        $nama_lokasi = mysqli_real_escape_string($koneksi, $_POST['nama_lokasi']);
        $lintang_dari = mysqli_real_escape_string($koneksi, $_POST['lintang_dari']);
        $lintang_sampai = mysqli_real_escape_string($koneksi, $_POST['lintang_sampai']);
        $bujur_dari = mysqli_real_escape_string($koneksi, $_POST['bujur_dari']);
        $bujur_sampai = mysqli_real_escape_string($koneksi, $_POST['bujur_sampai']);
        $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
        
        $sql = "UPDATE lokasi SET 
                nama_lokasi='$nama_lokasi', 
                lintang_dari='$lintang_dari', 
                lintang_sampai='$lintang_sampai', 
                bujur_dari='$bujur_dari', 
                bujur_sampai='$bujur_sampai', 
                deskripsi='$deskripsi'
                WHERE id='$id'";

        if ($koneksi->query($sql) === TRUE) {
            echo "Data berhasil diperbarui.";
        } else {
            echo "Error: " . $koneksi->error;
        }
    } else {
        echo "Form tidak lengkap.";
    }
    header("Location: index.php");
    exit();
} else {
    echo "Akses tidak sah.";
}

$koneksi->close();
?>
