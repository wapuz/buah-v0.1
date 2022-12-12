<?php 
    require 'functions.php';
    $q = query("SELECT * FROM buah ORDER BY nama");

if (isset($_POST['submit'])){
    if (queryTambahData($_POST) > 0){
        echo "<script> 
        alert('Data Berhasil Ditambahkan!');
        document.location.href='index.php';
        </script>";
    } else{
        echo "<script> 
        alert('Data Gagal Ditambahkan!');
        document.location.href='index.php';
        </script>";
    }
}
if (isset($_POST['search'])){
  $q = cari($_POST['cari']);
  
}
    $i = 1;
?>

<h1>Tabel Data Buah</h1>
<hr>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahData">
  Tambah Data
</button>
<form action="" method="post" style="display: inline;">
  <input type="text" name="cari">
  <button type="submit" name="search" class="btn btn-primary">Cari!</button>
</form>
<br><br>
<table class="table table-stripped table-bordered">
    <thead class="table-dark text-center">
        <th>No</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Deskripsi</th>
    </thead>
    <tbody class="align-middle">
        <?php foreach($q as $data) : ?>
        <tr class="text-center">
            <td ><?= $i++ ?></td>
            <td><div class="my-auto">
                <a class="btn btn-warning" href="ubah.php?id=<?= $data['id'] ?>">Ubah</a> | 
                <a class="btn btn-danger" href="hapus.php?id=<?= $data['id'] ?>" onclick="return confirm('Anda yakin ingin menghapus data <?= $data['nama'] ?>')">Hapus</a>
            </div></td>
            <td><img src="img/<?= $data['gambar'] ?>" alt="<?= $data['gambar'] ?>" class="my-auto" style="width: 100px;"></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['harga'] ?></td>
            <td class="text-start"><?= $data['deskripsi'] ?></td>
        </tr>
        <?php endforeach ;?>
    </tbody>
</table>



<!-- Modal tambah data-->
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama"  name="nama">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga"  name="harga">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi"  name="deskripsi" cols="30" rows="2"></textarea>
        </div>
        <div class="mb-3">
            <!-- <label for="nama" class="form-label">Nama</label> -->
            <input type="file" class="form-control" id="gambar"  name="gambar">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

