<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Ambil nama santri untuk pesan konfirmasi
    $query = mysqli_query($conn, "SELECT nama FROM santri WHERE id = $id");
    $santri = mysqli_fetch_assoc($query);
    $nama_santri = $santri['nama'];
    
    // Hapus data
    $delete_query = "DELETE FROM santri WHERE id = $id";
    
    if(mysqli_query($conn, $delete_query)) {
        header('Location: index.php?status=sukses&pesan=Santri ' . urlencode($nama_santri) . ' berhasil dihapus');
    } else {
        header('Location: index.php?status=error&pesan=Gagal menghapus data');
    }
} else {
    header('Location: index.php');
}

mysqli_close($conn);
?>