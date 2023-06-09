<?php 
$conn = mysqli_connect('localhost', 'root', '', 'manga');

function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //chek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM akun WHERE username = '$username'");
    if( mysqli_fetch_assoc($result) ){
        echo "<script>
            alert('username sudah terdaftar')
        </script>";
        return false;
    }

    // chek konfirmasi password
    if( $password !== $password2){
        echo "<script>
            alert ('konfirmasi password tidak sesuai')
        </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah user baru ke database
    mysqli_query($conn, "INSERT INTO akun VALUE ('', '$username', '$password','')");

    return mysqli_affected_rows($conn);
}

function query($query){
    global $conn;

    $require = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($require) ){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    if(isset($data["gendre"])){
        $gendre = implode(", ",$data["gendre"]);
    }else{
        $gendre = '';
    }
    $judul = $data["judul"];
    $artis = $data["artis"];
    $group = $data["group"];


    if(strpos($judul, "'")){
        $judul = str_replace("'", "\'", $judul);
    }

    if(strpos($judul, "&")){
        $judul = str_replace("&", "\&", $judul);
    }

    $query = "INSERT INTO list3 VALUE ('', '$judul', '', '','$gendre','$artis','$group')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function update($data, $id){
    global $conn;
    if(isset($data["gendre"])){
        $gendre = implode(", ",$data["gendre"]);
    }else{
        $gendre = '';
    }
    $judul = $data["judul"];
    $artis = $data["artis"];
    $group = $data["group"];


    if(strpos($judul, "'")){
        $judul = str_replace("'", "\'", $judul);
    }

    if(strpos($judul, "&")){
        $judul = str_replace("&", "\&", $judul);
    }

    $query = "UPDATE list3 set judul = '$judul', gendre = '$gendre', artis = '$artis', grup = '$group' where id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn; 
    mysqli_query($conn, "DELETE FROM list3 WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// function upload($file){
//     $namaFile = $file["files"]["name"];
//     $tmp_File = $file["files"]["tmp_name"];
//     $errorFile = $file["files"]["error"];
//     $sizeFile = $file["files"]["size"];

    // hitung ada berapa banyak data yang di upload

    // chek apakah yang di upload adalah gambar

//     for(){
//     $extensiGambarValid = ['jpg', 'jpeg', 'png'];
//     $extensiGambar = explode('.', $namaFile);
//     $extensiGambar = strtolower(end($extensiGambar));
//     if( !in_array($extensiGambar, $extensiGambarValid) ){
//         echo "<script>
//             alert('yang anda masukan bukan gambar !!');
//         </script>";
//         return false;
//     }
//     $namaFileBaru = uniqid();
//     $namaFileBaru .= '.';
//     $namaFileBaru .= $extensiGambar;

//     // jika lolos pengechekan, gambar siap di upload
//     move_uploaded_file($tmp_File, '../home/' .$namaFileBaru);
//     return $namaFileBaru;

// }

?>