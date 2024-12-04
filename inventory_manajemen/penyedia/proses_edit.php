<?php

session_start(); // Mulai sesi
include("../koneksi.php");

// Periksa apakah tombol "simpan" pada form edit di tekan
if (isset($_POST['simpan'])) {
    // Ambil data dari form 
    $id = $_POST['jenis_penyedia'];
    $jenispenyedia = $_POST['nama_penyedia'];
    $alamat = $_POST['alamat'];
    $kontak = $_POST['kontak'];

    // Buat query untuk memperbarui data siswa
    $sql = "UPDATE tb_events SET

        jenispenyedia='$namaEvent',
        alamat='$tanggal',
        kontak='$lokasi'
        WHERE jenis_penyedia = $id";






    // -- nama_event='$namaEvent',
    // -- lokasi='$lokasi',
    // -- tanggal='$tanggal',
    // -- WHERE id = $id";

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
