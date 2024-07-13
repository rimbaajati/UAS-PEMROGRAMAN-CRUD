<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Geografis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .container {
            margin: 0 auto;
            max-width: 800px;
        }
        .container h2 {
            text-align: center;
        }
        .form-box {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-box h3 {
            text-align: center;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            margin-bottom: 10px;
        }
        .form-group input, textarea {
            width: calc(100% - 12px);
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .judul-table {
            text-align: left;
            margin-left: 20px;
        }
        .table{
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table-data {
            margin: 0;
            justify-content: center;
        }
        .table th, table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
}
    </style>
</head>
<body>
    <div class="container">
        <h2>Sistem Informasi Geografis</h2>
        <div class="form-box">
            <h3>Tambah Lokasi Baru</h3>
            <form action="proses_create.php" method="post">
                <div class="form-group">
                    <label for="nama_lokasi">Nama Lokasi</label>
                    <input type="text" id="nama_lokasi" name="nama_lokasi" required>
                </div>
                <div class="form-group">
                    <label for="lintang_dari">Garis Lintang (Dari)</label>
                    <input type="text" id="lintang_dari" name="lintang_dari" required>
                </div>
                <div class="form-group">
                    <label for="lintang_sampai">Garis Lintang (Sampai)</label>
                    <input type="text" id="lintang_sampai" name="lintang_sampai">
                </div>
                <div class="form-group">
                    <label for="bujur_dari">Garis Bujur (Dari)</label>
                    <input type="text" id="bujur_dari" name="bujur_dari" required>
                </div>
                <div class="form-group">
                    <label for="bujur_sampai">Garis Bujur (Sampai)</label>
                    <input type="text" id="bujur_sampai" name="bujur_sampai">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Tambahkan</button>
                </div>
            </form>
        </div>
        <div class="table-data">
            <div class="judul-table"><h3>Data Lokasi</h3></div>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Lokasi</th>
                        <th>Garis Lintang (Dari-Sampai)</th>
                        <th>Garis Bujur (Dari-Sampai)</th>
                        <th>Deskripsi</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'config.php';
                    $query = "SELECT * FROM lokasi";
                    $result = $koneksi->query($query);
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['nama_lokasi'] . '</td>';
                            echo '<td>' . $row['lintang_dari'] . ' - ' . $row['lintang_sampai'] . '</td>';
                            echo '<td>' . $row['bujur_dari'] . ' - ' . $row['bujur_sampai'] . '</td>';
                            echo '<td>' . $row['deskripsi'] . '</td>';
                            echo '<td>' . $row['dibuat_pada'] . '</td>';
                            echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a> | <a href="delete.php?id=' . $row['id'] . '" onclick="return confirm(\'Yakin ingin menghapus?\')">Hapus</a></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="7">Tidak ada data ditemukan</td></tr>';
                    }
                    $koneksi->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
