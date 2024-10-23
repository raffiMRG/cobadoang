<?php 
require '../functions/functions.php';

// chek cookie
if( isset($_POST["submit"]) ){
    if( registrasi($_POST) > 0 ){
        echo "<script>
            alert ('user baru berhasil di tambahkan');
            document.location.href = '../login/login.php';
        </script>";
    }else{
        echo "<script>
            alert ('user baru gagal di tambahkan');
            document.location.href = '../login/login.php';
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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="title">
    <h1>Halaman Registrasi</h1>
    </div>

    <div class="main">
    <form action="" method="post">
        <ul>
            <li>
                <input type="text" name="username" id="username" placeholder="Username" required>
            </li>
        </ul>
        <ul>    
            <li>
                <input type="password" name="password" id="password" placeholder="Password"required>
            </li>
        </ul>
        <ul>    
            <li>
                <input type="password2" name="password2" id="password2" placeholder="Kofirmasi"required>
            </li>
        </ul>
        <ul>    
            <li>
                <input type="txt" name="email" id="email" placeholder="email">
            </li>
        </ul>
        <ul>
            <li>
                <button type="submit" name="submit">DAFTAR</button>
            </li>
        </ul>
        
    </form>
    </div>

</body>
</html>