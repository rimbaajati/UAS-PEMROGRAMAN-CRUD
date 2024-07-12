<?php
include 'config.php';
$id = $_GET['id'];
$result = $koneksi->query("SELECT * FROM simgeo_dasar WHERE id=$id");
$data = $result->fetch_assoc();
$result = $koneksi->query("SELECT * FROM simgeo_dasar");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Lokasi</title>
</head>
<body>
    <h1>Edit Lokasi</h1>
    <form action="proses_edit.php" method="post">
        <label>Lokasi:</label><br>
        <input type="text" name="lokasi"><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi"></textarea><br>

        <label>Lintang:</label><br>
        <input type="text" name="lintang"><br>

        <label>Bujur:</label><br>
        <input type="text" name="bujur"><br>

        <button type="submit">Edit</button>
    </form>
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
