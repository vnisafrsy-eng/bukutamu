<?php
// list.php
// Variabel $koneksi sudah tersedia dari index.php
?>
<h1>Tabel Buku Tamu</h1>
<a href="index.php?p=create" class="btn btn-primary">Input Buku Tamu</a> 

<table class="table table-striped table-hover mt-3">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Timestamp</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $tampil = $koneksi->query("SELECT * FROM tamu ORDER BY date_created DESC");
        $no = 1;
        while ($data=mysqli_fetch_assoc($tampil)){
            $time = $data['date_created'];
    ?>
    <tr>
      <th scope="row"><?= $no++ ?></th>
      <td><?= $data['nama'] ?></td>
      <td><?= $data['email'] ?></td>
      <td><?= date('d M Y H:i:s', strtotime($time)) ?></td>
      
      <td>
          <a href="index.php?key=<?= $data['id'] ?>&p=edit" class="btn btn-warning btn-sm">Edit</a>
          <a href="proses.php?id=<?= $data ['id'] ?>&aksi=hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
      </td>
    </tr>
    <?php
        }
    ?>
  </tbody> 
</table>