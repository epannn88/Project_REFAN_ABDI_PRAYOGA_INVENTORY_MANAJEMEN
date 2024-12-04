<?php
session_start(); // Mulai sesi
include("../koneksi.php");

// Periksa apakah ada ID yang dikirimmelalui URL
if (isset($_GET['barang_id'])) {
    // Ambil ID dari URL
    $id = $_GET['barang_id'];

    // Buat query untuk menghapus data siswa berdasarkan ID
    $sql = "DELETE FROM barang WHERE barang_id=$id";
    $query = mysqli_query($db, $sql);

    // Simpan pesan notifikasi dalam sesisiswa berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data barang berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Data barang gagal dihapus!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa ID, tampilkan pesan error
    die("Akses ditolak...");
}
?>