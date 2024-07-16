<!DOCTYPE html>
<html>
<head>
    <title>Tambah Lokasi</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
</head>
<body>
    <div class="judul">
    <h1>Tambah Lokasi</h1>
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
</body>
</html>
