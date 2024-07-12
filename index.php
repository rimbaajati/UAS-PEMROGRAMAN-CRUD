<?php
include 'config.php';
$result = $koneksi->query("SELECT * FROM simgeo_dasar");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Geografis</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .judul {
            text-align: center;
            margin: 20px 0;
        }
        .form{
            
        }
        
    </style>
<body>
    <div class="box">
        <div class="judul">
            <h2>Sistem Informasi Geografis</h2>
        </div>
        <div class="form">
            <div class="judul">
        <h4>Tambah Lokasi</h4>
            </div>
    <form action="proses_create.php" method="post">
        <label>Nama Tempat </label><br>
        <input type="text" name="lokasi"><br>

        <label>Lintang:</label><br>
        <input type="text" name="lintang"><br>

        <label>Bujur:</label><br>
        <input type="text" name="bujur"><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi"></textarea><br>

        <button type="submit">Tambahkan</button>
    </form>
</div>
</div>
            <div class="tabel">
                <a href="create.php">Tambah Data</a>
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Lokasi</th>
                            <th>Garis Lintang</th>
                            <th>Garis Bujur</th>
                            <th>Deskripsi</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['lokasi'] ?></td>
                                <td><?= $row['lintang'] ?></td>
                                <td><?= $row['bujur'] ?></td>
                                <td><?= $row['deskripsi'] ?></td>
                                <td><?= $row['tanggalbuat'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">Tidak ada data ditemukan</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
</body>
</html>
