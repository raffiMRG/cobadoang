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

function scan_dir($dir){
    $ignored = array('.', '..', '.svn', '.htaccess');

    $files = array();    
    foreach (scandir($dir) as $file) {
        if (in_array($file, $ignored)) continue;
        $files[$file] = filemtime($dir . '/' . $file);
    }

    arsort($files);
    $files = array_keys($files);

    return $files;
}

$dir = '../../new';
$datas = scan_dir($dir);
// $jumlah = count($datas);
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
        <a id="hamburger">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </a>
    </div>

    <!-- masuk dulu ke dalam judul -->
    <div class="container" id="container">
      <!-- <p style="color: white;">jumlah data : <?= $jumlah ?></p> -->
        <div class="containerTable">
            <table>
                <tr>
                    <th>N</th>
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
                    <?php 
                    $i++; 
                      // if($i == 110){
                      //     break;  
                      // }
                    ?>
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
    <script src="status.js"></script>
</body>
</html>