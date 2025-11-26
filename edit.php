<?php
// edit.php
// $koneksi sudah tersedia dari index.php

if (!isset($_GET['key'])) {
    header("Location: index.php?p=bukutamu");
    exit;
}

$id = $_GET['key'];
$edit = $koneksi->query("SELECT * FROM tamu WHERE id = '$id'");

if ($edit->num_rows === 0) {
    die("Data tidak ditemukan.");
}

$data = $edit->fetch_assoc();
?>

<div class="container mt-5">
    <h1 class="mb-4">Edit Buku Tamu</h1>
    <form action="proses.php" method="post">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $data['email'] ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php?p=bukutamu" class="btn btn-secondary">Batal</a>
    </form>
</div>