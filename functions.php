<?php 
$conn = mysqli_connect('localhost', 'root', '', 'crud');


function query($data){
    global $conn;
    $queryData = mysqli_query($conn, $data);
    $arr = [];
    while($fetch = mysqli_fetch_assoc($queryData)){
        $arr[] = $fetch;
    }
    return $arr;
}

function queryTambahData($data){
    global $conn;
    $nama = $data['nama'];
    $harga = $data['harga'];
    $deskripsi = $data['deskripsi'];
    $gambar = upload();
    if (!$gambar){return false;}
    
    $query = "INSERT INTO `buah`(`id`, `nama`, `harga`, `deskripsi`, `gambar`) 
    VALUES (UUID(),'$nama','$harga','$deskripsi','$gambar')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

    
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    
    // gambar belum ditambahkan
    if ($error == 4){
        echo "<script> 
        alert('gambar belum ditambahkan!');
        </script>";
        return false;
    }

    // cek apakah yang di upload adalah gambar 
    $extGambarValid = ['jpg', 'jpeg', 'png'];
    $extGambar = explode('.', $namaFile);
    $extGambar = strtolower(end($extGambar));

    if (!in_array($extGambar, $extGambarValid)){
        echo "<script> 
        alert('Yang di upload bukan gambar!');
        </script>";
        return false;
    }

    // cek ukuruan file 
    if ($ukuranFile > 50000){
        echo "<script> 
        alert('ukuran gambar Lebih dari 500 KB!');
        </script>";
        return false;
    }
    move_uploaded_file($tmpName, 'img/'. $namaFile);
    return $namaFile;
}

function queryHapus($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM `buah` WHERE id='$id'");

    return mysqli_affected_rows($conn);
}

function queryUbah($data, $id){
    global $conn;

    $nama = $data['nama'];
    $harga = $data['harga'];
    $deskripsi = $data['deskripsi'];

    $gambarlama = $data['gbrLama'];

    if($_FILES['gambar']['error'] == 4){
        $gambar =  $gambarlama;
    }else{
        $gambar = upload();
    }
    $query = "UPDATE `buah` SET 
    `nama`='$nama',
    `harga`='$harga',
    `deskripsi`='$deskripsi',
    `gambar`='$gambar',
    `tanggal`=CURRENT_TIMESTAMP WHERE id='$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($data){
    return query("SELECT * FROM buah WHERE nama LIKE '%$data%' ORDER BY nama");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            margin: auto;
            width: 90%;
        }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>