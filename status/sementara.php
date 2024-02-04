<!-- ================ NAVBAR ================== -->
<div class="navbar">
    <a href="" class="homeIcon">
        <h1 style="font-family: sans-serif; color: white;">HOME</h1>
    </a>
    <!-- search -->
    <form action="" method="post">
        <input type="text" name="keyword" id="keyword" placeholder="cari...">
    </form>
    <img src="js/img/loading2.gif" class="loading2" style="width: 30px; position:fixed; top: 30px; left: 175px; display: none;">

    <a href="logout/logout.php">
        <div class="logout">
            <img src="img/right-from-bracket-solid.svg">
        </div>
    </a>
    <a href="tambah/tambah.php">
        <div class="tambah">TAMBAH</div>
    </a>
    <a href="status/status.php">
        <div class="status">STATUS</div>
    </a>
</div>

<!-- ============== TABLE STATUS ========================= -->
<form action="upload.php" method="post" id="tabel-data">
        <?php foreach( $datas as $data) :  ?>
            <!-- pilih isi folder dengan index pertama  -->
        <?php 
        $betaData = $data;

        if($data != "." && $data != "..") :
        
            if(strpos($data, "'")){
                $data = str_replace("'", "\'", $data);
            }

            if(strpos($data, "&")){
                $data = str_replace("&", "\&", $data);
            }

            // chek kalau tidak ada di data base catat
            $result = mysqli_num_rows(select($data));
            // echo '=============';
            // var_dump($result);
            if($result){
                continue;
            }
            // $id = $data["id"];
            $judul = $betaData;
            $thumbnail = scandir("../../new/$judul/."); 
            $thumbnail = $thumbnail[2];  
            ?>
            <!-- tampilkan -->
            <tr style="border: 2px solid black;">
                <td><?= $i ?></td>
                <td>
                    <div class="judul"><p><?= $judul ?></p></div>    
                </td>
                <td>
                    <img src="../../new/<?= $judul ?>/<?= $thumbnail ?>" class="img">
                </td>
                <td>
                    <input type="checkbox" name="data[]" value="<?= $data ?>">
                </td>
            </tr>
            <?php $i++ ?>
        <?php endif ; ?>
        <?php endforeach ;  ?>
        </form>


        <form action="sementara.php" method="post" id="tabel-data">
        <tr>
            <td>1</td>
            <td>(C88) [ERECT TOUCH (Erect Sawaru)] Nitta Minami to Anya ga Tenshisugite Mesuinuka Choukyou Mattanashi na Ken (THE IDOLM@STER CINDERELLA GIRLS) [English] [sneikkimies]</td>
            <td>
                <img src="../../asd.jpg" class="img">
            </td>
            <td>
                <input type="checkbox" name="data[]" value="ini data 1">
            </td>
        </tr>
        </form>