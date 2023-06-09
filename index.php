<?php 
session_start();
require 'functions/functions.php';

// chek apakah sudah login
if(!isset($_SESSION["login"])){
    header("Location: login/login.php");
    exit;
}
// jumlah data dalam 1 halaman
$JumlahDataPerHalaman = 20;

// jumlah data
$jumlahData = count(query("SELECT * FROM list3"));

// jumlah halaman
$jumlahHalaman = ceil($jumlahData / $JumlahDataPerHalaman);

// halaman aktif
$halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;

// algoritma mencari index awal
$awalData = ( $JumlahDataPerHalaman * $halamanAktif ) - $JumlahDataPerHalaman;

//query 
$datas = query("SELECT * FROM list3 ORDER BY id DESC LIMIT $awalData, $JumlahDataPerHalaman");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        
        
    </style>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <a href="">
    <h1 style="font-family: sans-serif; color: white;">HOME</h1>
    </a>
    <!-- search -->
    <form action="" method="post">
        <input type="text" name="keyword" id="keyword" placeholder="cari...">
    </form>
    <img src="js/img/loading2.gif" class="loading2" style="width: 30px; position:fixed; top: 30px; left: 175px; display: none;">

    <a href="logout/logout.php">
        <div class="logout">LOGOUT</div>
    </a>
    <a href="tambah/tambah.php">
        <div class="tambah">TAMBAH</div>
    </a>

<!-- tampilkan data di depan -->

    <!-- masuk dulu ke dalam judul -->
    <div class="main" id="main">    
        <?php foreach( $datas as $data) :  ?>
            <!-- pilih isi folder dengan index pertama  -->
            <?php 
            $id = $data["id"];
            $judul = $data["judul"];
            $thumbnail = scandir("../new/$judul/."); 
            $thumbnail = $thumbnail[2];  
            ?>
            <!-- tampilkan -->
            <div class="container">
                <a href="tampil/tampil.php?id=<?= $id ?>">    
                    <img src="../new/<?= $data["judul"] ?>/<?= $thumbnail ?>" class="img">
                    <div class="judul"><p><?= $data["judul"] ?></p></div>
                </a>    
            </div>
        <?php endforeach ;  ?>
</div>
<div class="navPage">
            <?php if($halamanAktif > 1) : ?>
                <a href="?page=<?= $halamanAktif -1 ?>">&laquo;</a>
            <?php endif; ?>
            <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if( $i == $halamanAktif ) : ?>
                    <a href="?page=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
                <?php else : ?>
                    <a href="?page=<?= $i; ?>"><?= $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>
            <?php if($halamanAktif < $jumlahHalaman) : ?>
                <a href="?page=<?= $halamanAktif +1 ?>">&raquo;</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>