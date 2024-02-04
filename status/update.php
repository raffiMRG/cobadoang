<?php 
// buat function query
$conn = mysqli_connect("localhost", "root", "", "manga");

function insert($keyword){
    global $conn;
    $query = "INSERT INTO tb_sementara VALUE ('', '$keyword', '', '', '', '', '')";
    mysqli_query($conn, $query);
    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}

function select($keyword){
    // var_dump($keyword);
    global $conn;
    $query = "SELECT * FROM list3 WHERE judul = '$keyword'";
    return mysqli_query($conn, $query);
}

$dir = '../../new';
$files1 = scandir($dir, SCANDIR_SORT_ASCENDING);
$i = 1;

// var_dump($files1[0]);

foreach($files1 as $file){
    if($file != "." && $file != ".."){
        
        if(strpos($file, "'")){
            $file = str_replace("'", "\'", $file);
        }
    
        if(strpos($file, "&")){
            $file = str_replace("&", "\&", $file);
        }

        // chek kalau tidak ada di data base catat
        $result = mysqli_num_rows(select($file));
        // echo '=============';
        // var_dump($result);
        if($result){
            continue;
        }

        var_dump($file);

        // if(insert($file) > 0){
        //     echo "<script>alert('$file berhasil')</script>";
        // }else{
        //     echo "<script>alert('$file GAGAL!!!')</script>";
        // }
    }

}

// echo "<script>alert('UDAH SEMUA!!')</script>";

// header('Location: web/');
?>