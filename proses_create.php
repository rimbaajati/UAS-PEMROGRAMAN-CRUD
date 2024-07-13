<?php include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lokasi = mysqli_real_escape_string($koneksi, $_POST['nama_lokasi']);
    $lintang_dari = mysqli_real_escape_string($koneksi, $_POST['lintang_dari']);
    $lintang_sampai = mysqli_real_escape_string($koneksi, $_POST['lintang_sampai']);
    $bujur_dari = mysqli_real_escape_string($koneksi, $_POST['bujur_dari']);
    $bujur_sampai = mysqli_real_escape_string($koneksi, $_POST['bujur_sampai']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    $sql = "INSERT INTO lokasi (nama_lokasi, lintang_dari, lintang_sampai, bujur_dari, bujur_sampai, deskripsi) 
            VALUES ('$nama_lokasi', '$lintang_dari', '$lintang_sampai', '$bujur_dari', '$bujur_sampai', '$deskripsi')";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}
?>
