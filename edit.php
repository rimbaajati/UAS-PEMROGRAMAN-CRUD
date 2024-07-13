<?php include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM lokasi WHERE id='$id'";
    $result = $koneksi->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama_lokasi = $row['nama_lokasi'];
        $lintang_dari = $row['lintang_dari'];
        $lintang_sampai = $row['lintang_sampai'];
        $bujur_dari = $row['bujur_dari'];
        $bujur_sampai = $row['bujur_sampai'];
        $deskripsi = $row['deskripsi'];
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }

    $koneksi->close();
} else {
    echo "ID tidak ditemukan.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lokasi - Sistem Informasi Geografis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: calc(100% - 12px);
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .form-group textarea {
            height: 80px;
        }
        .form-group button {
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button[type="submit"] {
            margin-top: 10px;
        }
        .form-group button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Lokasi</h2>
        <form action="proses_edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="nama_lokasi">Nama Lokasi</label>
                <input type="text" id="nama_lokasi" name="nama_lokasi" value="<?php echo $nama_lokasi; ?>" required>
            </div>
            <div class="form-group">
                <label for="lintang_dari">Garis Lintang (Dari)</label>
                <input type="text" id="lintang_dari" name="lintang_dari" value="<?php echo $lintang_dari; ?>" required>
            </div>
            <div class="form-group">
                <label for="lintang_sampai">Garis Lintang (Sampai)</label>
                <input type="text" id="lintang_sampai" name="lintang_sampai" value="<?php echo $lintang_sampai; ?>">
            </div>
            <div class="form-group">
                <label for="bujur_dari">Garis Bujur (Dari)</label>
                <input type="text" id="bujur_dari" name="bujur_dari" value="<?php echo $bujur_dari; ?>" required>
            </div>
            <div class="form-group">
                <label for="bujur_sampai">Garis Bujur (Sampai)</label>
                <input type="text" id="bujur_sampai" name="bujur_sampai" value="<?php echo $bujur_sampai; ?>">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi"><?php echo $deskripsi; ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
    
</body>
</html>
