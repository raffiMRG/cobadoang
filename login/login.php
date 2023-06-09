<?php 
session_start();

require '../functions/functions.php';
// chek cookie

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username'");

    // chek username
    if(mysqli_num_rows($result) === 1){
        // chek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,  $row["password"])){
            // set session
            $_SESSION["login"] = true;
            header("Location: ../");
            exit;
        }
    }
    $error =  false;
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
        <h1>Halaman Login</h1>
    </div>

    <div class="main">
        <?php if(isset($error)) : ?>
            <p style="color: red; font-style: italic;">username / password yang di masukan salah</p>
        <?php endif; ?>
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
                <button type="submit" name="login">LOGIN</button>
                <a href="../registrasi/registrasi.php"><div class="regis">DAFTAR</div></a>
            </li>
        </ul>
        
    </form>
    </div>

</body>
</html>