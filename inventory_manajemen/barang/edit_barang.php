<?php
// Termasuk file konfigurasi
include("../koneksi.php");

// mengambil ID siswa dari parameter URL
$id = $_GET['id'];

// mengambil data siswa dari database berdasarkan ID
$query = $db->query("SELECT * FROM barang WHERE barang_id = '$id'");
$barang = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data barang</title>
</head>

<body>
    <h3>Edit Data barang</h3>
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="barang_id" value="<?php echo $barang['barang_id']; ?>">
        <table border="0">
            <tr>
                <td>Nama_barang</td>
                <td>
                    <input type="text" name="nama"
                        value="<?php echo $barang['nama']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>stock</td>
                <td>
                    <input type="text" name="stock"
                        value="<?php echo $barang['stock']; ?>" required>
                </td>
            </tr>
            <tr>
            <td>harga</td>
                <td>
                    <input type="text" name="harga"
                        value="<?php echo $barang['harga']; ?>" required>
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>

</html>