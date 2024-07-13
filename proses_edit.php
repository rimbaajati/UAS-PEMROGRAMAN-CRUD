<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan data yang diperlukan ada
    if (isset($_POST['id'], $_POST['nama_lokasi'], $_POST['lintang_dari'], $_POST['bujur_dari'])) {
        // Ambil nilai dari form
        $id = $_POST['id'];
        $nama_lokasi = $_POST['nama_lokasi'];
        $lintang_dari = $_POST['lintang_dari'];
        $lintang_sampai = $_POST['lintang_sampai'];
        $bujur_dari = $_POST['bujur_dari'];
        $bujur_sampai = $_POST['bujur_sampai'];
        $deskripsi = $_POST['deskripsi'];

        // Query untuk update data
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

    // Redirect kembali ke halaman index setelah proses selesai
    header("Location: index.php");
    exit();
} else {
    echo "Akses tidak sah.";
}

$koneksi->close();
?>
