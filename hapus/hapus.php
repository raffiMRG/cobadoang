<?php 
require "../functions/functions.php";

$id = $_GET["id"];

$hapus = hapus($id);

if($hapus >= 0){
    echo "<script>
         alert('Data Berhasil Di Hapus!!!');
         document.location.href  = '../'
         </script>";
}else{
    echo "<script>
         alert('Data Gagal Di Hapus!!!');
         document.location.href  = '../'
         </script>";    
}

?>