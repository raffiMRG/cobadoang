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

// ===========================================

function callAPI($method, $url, $data = false){
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  if ($data) curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

  // Set opsi umum untuk cURL
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_HTTPHEADER, [
      'Content-Type: application/json',
  ]);

  // Eksekusi permintaan cURL dan ambil responnya
  $result = curl_exec($curl);

  // Cek jika ada kesalahan
  if (curl_errno($curl)) {
      echo 'Curl error: ' . curl_error($curl);
  }

  // Tutup sesi cURL
  curl_close($curl);

  return $result;
}

$datas = callAPI('GET', 'http://127.0.0.1:1221/folders', true);
$datas = json_decode($datas, true);
$datas = $datas['folders'];

// var_dump($datas);
// die;
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
                      if($i == 110){
                          break;  
                      }
                      $i++;
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