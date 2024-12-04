<?php
// menghubungkan file config dengan index 
session_start();
include("../koneksi.php");
// Mulai sesi
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>inventory_manajemen</title>
    <style>
        /* membuat styling pada table*/
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
</head>

<body>
    <h4><a href="../penyedia/index.php" class="btn btn-primary">Data penyedia</a></h4>
    <h4><a href="../barang/index.php" class="btn btn-primary">Data barang</a></h4>
    <h2>Data barang</h2>
    <!-- Tampilkan notifikasi Jika Ada  -->
    <?php if (isset($_SESSION['notifikasi'])): ?>
        <p><?php echo $_SESSION['notifikasi']; ?></p>
        <!-- Hapus notifikasi setelah ditampilkan -->
        <?php unset($_SESSION['notifikasi']); ?>
    <?php endif; ?>

    <table>
        <thead>
            <tr align="center">
                <th>#</th>
                <th>Nama barang</th>
                <th>stock</th>
                <th>harga</th>
                <th><a href="tambah_barang.php" class="btn btn-primary">Tambah Data</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1; // membuat penomoran data dari 1
            // membuat variabel untuk menjalankan query SQL
            $query = $db->query("SELECT * FROM barang");
            /* perulangan while akan terus berjalan (menampilkan data) selama kondisi $query bernilai true (adanya data pada table tb_siswa) */
            while ($barang = $query->fetch_assoc()) {
                /* fungsi fetch-assoc digunakan untuk mengambil data perulangan dalam bentuk array */
            ?> <!-- kode PHP ditutup untuk menyisipkan kode HTML yang akan di looping menggunakan while loop -->
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $barang['nama'] ?></td>
                    <td><?php echo $barang['stock'] ?></td>
                    <td><?php echo $barang['harga'] ?></td>
                    <td align="center">
                        <!-- URL kehalaman edit data dengan menggunakan parameter id pada kolom table -->
                        <a href="edit_barang.php?id=<?php echo $barang['barang_id'] ?>">Edit</a>
                        <!--URL ke halaman untuk menghapus data dengan menggunakan parameter id pada kolom table dan alert confirmasi hapus data-->
                        <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="hapus_barang.php?barang_id=<?php echo $barang['barang_id'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php
            } /* Mengakhiri proses perulangan while yang dimulai pada baris 48 */
            ?>
        </tbody>
    </table>
    <!-- Menghitung jumlah baris yang ada pada table (calon_siswa) -->
    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>

</html>