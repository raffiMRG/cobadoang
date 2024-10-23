<?php 
require '../functions/functions.php';

$id = $_GET["id"];
$data = query("SELECT * FROM list3 WHERE id = $id")[0];
$judul = $data["judul"];

if($data["gendre"] == NULL){
    $gendres[0] = "kosong";
}else{
    $gendres = explode(", ", $data["gendre"]);
}

// var_dump($gendre);
// die;

$count = count(scandir("../../new/$judul"));
$count = $count - 2;

$pages = scandir("../../new/$judul");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-media.css">
</head>
<body>
    <div class="main" style="width: 100%; background-color: grey; align-items: center;">
        <a href="../">
                <div class="kembali">KEMBALI</div>
        </a>

        <a href="../edit/edit.php?id=<?= $id ?>">
                <div class="edit">EDIT</div>
        </a>

        <div class="property">
            <h2><?= $judul ?></h2>
            <p>Parody    : <a href="">coba 1</a></p>
            <p>Artis        : <a href="">coba 2</a></p>
            <p>Group     : <a href="">coba 3</a></p>
            <p>Gendre   : 
                <?php foreach($gendres as $gendre) : ?>
                <a href="gendre/index.php?gendre=<?= $gendre?>"><?= $gendre ?></a>
                <?php endforeach; ?>
            </p>
            <p>Page : <?= count($pages) -2 ?></p>
        </div>
        <div class="container">
            <?php foreach( $pages as $page ) : ?>
                <?php if($page === ".." || $page === ".") : ?>
                    <?php continue; ?>
                <?php endif ; ?>
                <img class="image" src="../../new/<?= $judul?>/<?= $page ?>">    
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
