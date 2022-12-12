<?php 
require 'functions.php';
$id = $_GET['id'];

$buah = query("SELECT * FROM buah WHERE id='$id'");

if(isset($_POST['submit'])){
    if(queryUbah($_POST, $id) > 0){
        echo "<script> 
        alert('Data Berhasil Diubah!'); 
        document.location.href='index.php';
        </script>";
    }else{
        echo "<script> 
        alert('Data Gagal Diubah!'); 
        document.location.href='index.php';
        </script>";
    }
}


?>
<h1>Ubah Data : <?=$buah[0]['nama']?></h1>
<hr>

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?=$buah[0]['gambar']?>" name="gbrLama">
      <div class="modal-body">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama"  name="nama" value="<?=$buah[0]['nama']?>">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga"  name="harga" value="<?=$buah[0]['harga']?>">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi"  name="deskripsi" cols="30" rows="2"><?=$buah[0]['deskripsi']?></textarea>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Gambar :</label>
            <img src="img/<?=$buah[0]['gambar']?>" alt="" style="width: 80px; display:block;">
            <input type="file" class="form-control" id="gambar"  name="gambar">
        </div>
      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-secondary">Close</a>
        <button type="submit" class="btn btn-primary" name="submit">Simpan Perubahan</button>
      </div>
</form>