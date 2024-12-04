<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ineventory_manajement</title>
</head>

<body>
    <h3>Tambah Data penyedia</h3>
    <form action="proses_tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>jenis penyedia</td>
                <td><input type="text" name="jenis" required></td>
            </tr>
            <tr>
                <td>alamat</td>
                <td><input type="text" name="alamat" required></td>
            </tr>
            <tr>
                <td>kontak</td>
                <td><input type="text" name="kontak" required></td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>

</html>