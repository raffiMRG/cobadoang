<?php 
// koneksi ke database
require '../functions/functions.php';
// tangkap id yang mau di edit
$id = $_GET["id"];
// ambil data dengan acuan id
$data = query("SELECT * FROM list3 WHERE id = $id")[0];

$judul = $data["judul"];
$gendre = explode(", ",$data["gendre"]);
$artis = $data["artis"];
$grup = $data["grup"];

// echo count($gendre);
// die;

// chek apakah tombol upload di pencet
if(isset($_POST["upload"])){
    // upload nama ke database
    if( update($_POST, $id) >= 0 ){
        echo "<script>
            alert ('data berhsil di upload!!!');
            document.location.href = 'edit.php?id=$id';
        </script>";
        // echo "<script>
        //     alert ('data berhsil di upload!!!');
        // </script>";
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
                <input type="text" name="judul" id="judul" required autofocus autocomplete="off" value="<?= $judul ?>">        
            </li>
            <br>
            <li>
                <input type="checkbox" name="gendre[]" id="comedy" style="display: inline;" value="comedy" <?php if (in_array("comedy", $gendre)) echo "checked"; ?>>        
                <label for="comedy">comedy</label>
            </li>
            <li>
                <input type="checkbox" name="gendre[]" id="romatic" style="display: inline;" value="romantic" <?php if (in_array("romantic", $gendre)) echo "checked"; ?>>        
                <label for="romatic">romatic</label>
            </li>
            <li>
                <input type="checkbox" name="gendre[]" id="action" style="display: inline;" value="action" <?php if (in_array("action", $gendre)) echo "checked"; ?>>        
                <label for="action">action</label>
            </li>

            <br>

            <li>
                <label for="artis">artis</label>
                <input type="text" name="artis" id="artis" value="<?= $artis ?>">
            </li>
            <li>
                <label for="group">group</label>
                <input type="text" name="group" id="group" value="<?= $grup ?>">
            </li>
            <br>
            <li>
                <input type="Submit" name="upload" style="width: 150px; height: 50px;">
            </li>
            <li>
                <a href="../hapus/hapus.php?id=<?= $id ?>">
                    <div class="hapus" style="width: 150px; height: 50px; background-color: black; color: #f3f3f3; border-radius: 5px; text-align: center; line-height: 50px;">
                        HAPUS
                    </div>
                </a>
            </li>
        </ul>
    </form>

</body>
</html>