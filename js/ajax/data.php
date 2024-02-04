<?php 
require '../../functions/functions.php';

$keyword = $_GET["keyword"];

$datas = query("SELECT * FROM list3 WHERE judul LIKE '%$keyword%' ORDER BY id DESC");
// $datas = query("SELECT * FROM list2");

?>


<?php foreach( $datas as $data) :  ?>
            <!-- pilih isi folder dengan index pertama  -->
            <?php 
            $judul = $data["judul"];
            $id = $data["id"];
            $thumbnail = scandir("../../../new/$judul/."); 
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