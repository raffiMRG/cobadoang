<?php 
    if(isset($_POST["data"])){
        // var_dump($_POST["data"]);
    }else{
        echo "<script>alert('status FALSE!!!')</script>";
        die;
    }

    $conn = mysqli_connect("localhost", "root", "", "manga");
    $files = $_POST["data"];

    function insert($keyword){
        global $conn;
        $query = "INSERT INTO list3 VALUE ('', '$keyword', '', '', '', '', '')";
        mysqli_query($conn, $query);
        echo mysqli_error($conn);
        return mysqli_affected_rows($conn);
    }

    // $panjang = count($files);

    // for($i = 0; $i < $panjang; $i++){
    //     $file = $files[$i];
    //     if(insert($file) > 0){
    //         echo "<script>alert('$file berhasil')</script>";
    //     }else{
    //         echo "<script>alert('$file GAGAL!!!')</script>";
    //     }
    //     if($i === $panjang -1){
    //         header("Location: ../");
    //     }
    // }

    foreach( $files as $file ){
        if(insert($file) > 0){
            echo "<script>alert('$file berhasil')</script>";
        }else{
            echo "<script>alert('$file GAGAL!!!')</script>";
        }
    }
    echo "<script>alert('UDAH SEMUA')</script>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .homeBtn{
            width: 100px;
            height: 50px;
            background-color: red;
            color: while;
        }
    </style>
</head>
<body>
    <a href="../">
        <div class="homeBtn">HOME</div>
    </a>

</body>
</html>