<?php 
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ../login/login.php");
    exit;
}

// =====================================
// ============ SET PROPERTY & MTHOD ===============

$conn = mysqli_connect("localhost", "root", "", "manga");

function select($keyword){
    // var_dump($keyword);
    global $conn;
    $query = "SELECT * FROM list3 WHERE judul = '$keyword'";
    return mysqli_query($conn, $query);
}

$dir = '../../new';
$datas = scandir($dir, SCANDIR_SORT_ASCENDING);
$i = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="status.css">
    <link rel="stylesheet" href="status-media.css">
</head> 
<body>
    <div class="navbar">
        <div class="icon"><a href="../" style="text-decoration: none;">THIS <span>ICON</span></a></div>
        <div class="nav">
            <a href="#">Item 1</a>
            <a href="#">Item 2</a>
            <button name="tabel-data" type="submit" form="tabel-data">Submit</button>
        </div>
    </div>

    <!-- masuk dulu ke dalam judul -->
    <div class="container" id="container">
        <div class="containerTable">
            <table>
                <tr>
                    <th>NUM</th>
                    <th>Title</th>
                    <th>Thumbnail</th>
                    <th>Upload</th>
                </tr>
                <!-- FORM START -->
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
                    <tr>
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
                <!-- FORM END -->
            </table>
        </div>
    </div>
    <div class="footer">
            <div class="quote">
                <p>- _ -</p>
            </div>
        </div>

</body>
</html>