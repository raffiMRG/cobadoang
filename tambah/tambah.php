<?php 
// koneksi ke database
require '../functions/functions.php';
// chek apakah tombol upload di pencet

if(isset($_POST["upload"])){
//     if (!isset($_POST["gendre"])){
//         echo '$gendre tidak bernilai';
//         die;
//     }
//     $gendre = $_POST["gendre"];
//     var_dump($gendre);
//     die;

    // upload nama ke database
    if( tambah($_POST) >= 0 ){
        // echo "<script>
        //     alert ('data berhsil di upload!!!');
        //     document.location.href = '../';
        // </script>";
        echo "<script>
            alert ('data berhsil di upload!!!');
        </script>";
    }else{
    echo "<script>
        alert ('data gagal di upload!!!');
    </script>";
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <h1>Tambah Data</h1>

    <a href="../">
        <div class="keluar">Keluar</div>
    </a>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="judul">Nama Folder</label>
                <input type="text" name="judul" id="judul" required autofocus autocomplete="off" size="75">        
            </li>
            <br>
            <li>
                <input type="checkbox" name="gendre[]" id="comedy" style="display: inline;" value="comedy">        
                <label for="comedy">comedy</label>
            </li>
            <li>
                <input type="checkbox" name="gendre[]" id="romatic" style="display: inline;" value="romantic">        
                <label for="romatic">romatic</label>
            </li>
            <li>
                <input type="checkbox" name="gendre[]" id="action" style="display: inline;" value="action">        
                <label for="action">action</label>
            </li>

            <br>

            <li>
                <label for="artis">artis</label>
                <input type="text" name="artis" id="artis">
            </li>
            <li>
                <label for="group">group</label>
                <input type="text" name="group" id="group">
            </li>
            <br>
            <li>
                <input type="Submit" name="upload" style="width: 150px; height: 50px;">
            </li>
        </ul>
    </form>

</body>
</html>