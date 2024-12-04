<?php
// Termasuk file konfigurasi
include("../koneksi.php");

// mengambil ID siswa dari parameter URL
$id = $_GET['id'];

// mengambil data siswa dari database berdasarkan ID
$query = $db->query("SELECT * FROM penyedia WHERE penyedia_id = '$id'");
$penyedia = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data penyedia</title>
</head>

<body>
    <h3>Edit Data penyedia</h3>
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="penyedia_id" value="<?php echo $penyedia['penyedia_id']; ?>">
        <table border="0">
            <tr>
                <td>Nama_penyedia</td>
                <td>
                    <input type="text" name="nama"
                        value="<?php echo $penyedia['nama']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>jenis</td>
                <td>
                    <input type="text" name="alamat"
                        value="<?php echo $penyedia['alamat']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>alamat</td>
                <td>
                    <input type="date" name="alamat"
                        value="<?php echo $penyedia['kontak']; ?>" style="width: 100%">
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>

</html>