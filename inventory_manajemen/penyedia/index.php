<?php
// menghubungkan file config dengan index 
include("../koneksi.php");
session_start();
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
    <h4><a href="../events/index.php" class="btn btn-primary">Data penyedia</a></h4>
    <h4><a href="../partisipan/index.php" class="btn btn-primary">Data barang</a></h4>
    <h2>Data penyedia</h2>
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
                <th>Jenis penyedia</th>
                <th>alamat</th>
                <th>kontak</th>
                <th><a href="tambah_penyedia.php" class="btn btn-primary">Tambah Data</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1; // membuat penomoran data dari 1
            // membuat variabel untuk menjalankan query SQL
            $query = $db->query("SELECT * FROM penyedia");
            /* perulangan while akan terus berjalan (menampilkan data) selama kondisi $query bernilai true (adanya data pada table tb_siswa) */
            while ($penyedia = $query->fetch_assoc()) {
                /* fungsi fetch-assoc digunakan untuk mengambil data perulangan dalam bentuk array */
            ?> <!-- kode PHP ditutup untuk menyisipkan kode HTML yang akan di looping menggunakan while loop -->
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $penyedia['jenis_penyedia'] ?></td>
                    <td><?php echo $penyedia['alamat'] ?></td>
                    <td><?php echo $penyedia['kontak'] ?></td>
                    <td align="center">
                        <!-- URL kehalaman edit data dengan menggunakan parameter id pada kolom table -->
                        <a href="edit_penyedia.php?id=<?php echo $penyedia['penyedia_id'] ?>">Edit</a>
                        <!--URL ke halaman untuk menghapus data dengan menggunakan parameter id pada kolom table dan alert confirmasi hapus data-->
                        <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="hapus_penyedia.php?penyedia_id=<?php echo $penyedia['penyedia_id'] ?>">Hapus</a>
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