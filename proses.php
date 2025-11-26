<?php
// proses.php
require 'koneksi.php';

// ----------------------------------------------------
// 🚀 Aksi CREATE (Menyimpan Data Baru)
// ----------------------------------------------------
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    // $komentar = $_POST['komentar']; <-- DIHILANGKAN

    // QUERY HANYA MENYIMPAN NAMA DAN EMAIL
    $sql = "INSERT INTO tamu(nama,email) VALUES ('$nama','$email')";
    $query = $koneksi->query($sql);

    if($query){
        header("Location:index.php?p=bukutamu");
        exit;
    } else {
        die("Gagal menyimpan data! Error: " . $koneksi->error); 
    }
}

// ----------------------------------------------------
// 🔄 Aksi UPDATE (Mengubah Data)
// ----------------------------------------------------
if(isset($_POST['update'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    // $komentar = $_POST['komentar']; <-- DIHILANGKAN
    $id = $_POST['id'];

    // QUERY UPDATE HANYA MENGUBAH NAMA DAN EMAIL
    $sql = "UPDATE tamu SET nama='$nama', email='$email' WHERE id='$id'";
    $query = $koneksi->query($sql);

    if($query){
        header("Location:index.php?p=bukutamu");
        exit;
    } else {
        die("Gagal mengupdate data! Error: " . $koneksi->error); 
    }
}

// ----------------------------------------------------
// 🗑️ Aksi DELETE (Tidak ada perubahan, ID tetap diperlukan)
// ----------------------------------------------------
if(isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM tamu WHERE id='$id'";
        $hapus = $koneksi->query($sql);

        if($hapus) {
            header("location:index.php?p=bukutamu");
            exit; 
        } else {
            die("Gagal menghapus data! Error: " . $koneksi->error);
        }
    }
}
?>