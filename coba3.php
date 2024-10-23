<?php 
$dir = "../new";

// $datas = scandir($dir);

// $panjang = count($datas);



$i = 1;
// if (is_dir($dir)) {
//     if ($dh = opendir($dir)) {
//         while (($file = readdir($dh)) !== false) {
//             echo "filename $i : $file\n";
//             $i++;
//         }
//         closedir($dh);
//     }
// }



if (is_dir($dir)) {
  $folders = array_filter(scandir($dir), function($item) use ($dir) {
      return is_dir($dir . DIRECTORY_SEPARATOR . $item) && !in_array($item, ['.', '..']);
  });

  foreach ($folders as $folder) {
    echo "filename $i : $folder\n";
    $i++;
  }
} else {
  echo "The specified path is not a directory.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <!-- <p>panjang data adalah : <?= $panjang ?></p> -->
</body>
</html>

<!-- Jika scandir() masih gagal, Anda bisa mencoba menggunakan fungsi lain seperti opendir(), readdir(), dan closedir() untuk membaca isi direktori secara bertahap, yang mungkin lebih efisien dalam penggunaan memori. -->