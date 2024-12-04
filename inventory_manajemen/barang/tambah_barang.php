<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ineventory_manajement</title>
</head>

<body>
    <h3>Tambah Data barang</h3>
    <form action="proses_tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>Nama barang</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>stock</td>
                <td><input type="text" name="stock" required></td>
            </tr>
            <tr>
                <td>harga</td>
                <td><input type="text" name="harga" required></td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>

</html>