<?php

session_start(); // Mulai sesi
include("../koneksi.php");

// Periksa apakah tombol "simpan" pada form edit di tekan
if (isset($_POST['simpan'])) {
    // Ambil data dari form 
    $id = $_POST['barang_id'];
    $namabarang = $_POST['nama'];
    $stock = $_POST['stock'];
    $harga = $_POST['harga'];

    // Buat query untuk memperbarui data siswa
    $sql = "UPDATE barang SET

        nama='$namabarang',
        stock='$stock',
        harga ='$harga'
        WHERE barang_id=$id";

    $query = mysqli_query($db, $sql);
    // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data siswa berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Data siswa gagal diperbarui!";
    }
    // Alihkan ke halaman index.php
    header("Location: index.php");
} else {
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
