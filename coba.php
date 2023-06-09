<?php 
// var_dump($_POST);
// echo "<hr>";
// var_dump($_FILES);


// mkdir("coba2", 0777);
?>

<html>
  <head>
  <title>Upload Folder using PHP </title>
  </head>
  <body>

    <!-- <form action="" method="post" enctype="multipart/form-data"> 
    Type Folder Name:<input type="text" name="foldername" /><br/><br/>
    Select Folder to Upload: <input type="file" name="files[]" id="files" multiple directory="" webkitdirectory="" moxdirectory="" /><br/><br/> 
    <input type="Submit" value="Upload" name="upload" />
    </form> -->

    <!-- ================================================================================== -->

<!-- <style>
.container {
  height: 200px;
  position: relative;
  border: 3px solid green;
}

.center {
    width: 100px;
    height: 100px;
    background-color: blue;
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>

<div class="container">
  <div class="center">
    <p>I am vertically and horizontally centered.</p>
  </div>
</div> -->

<!-- ===================================================================================== -->

<style>
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
  border: 3px solid green; 
}
.kotak0
{
  width: 1100px;
  height: 2000px;
  margin: auto;
  background-color: blue;
  opacity: 0.7;
}
.kotak1{
    width: 200px;
    height: 300px;
    background-color: grey;
    margin: auto;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    float: left;
    padding: 10px;

    /* position: absolute; */
}
.kotak2{
    display: flex;
    z-index: 1;
    width: 200px;
    height: 300px;
    background-image: url("home/a/");
    margin: auto;
  }
.kotak3{
  margin: auto;
    position: relative;
    top: -50px;
    display: flex;
    width: 200px;
    height: 50px;
    background-color: black;
    opacity: 0.8;
}
.kotak3:hover{
  top: -100px;
  height: 100;
}

</style>

<div class="center">
    <div class="inner" style="width: 100px; height: 100px; background-color: blue;">coba</div>
  <!-- <p>I am vertically and horizontally centered.</p> -->
</div>
<div class="kotak0">
  <?php for( $i = 1; $i <= 13; $i++ ) : ?>
    <div class="kotak1">
        <div class="kotak2"></div>
        <div class="kotak3"></div>
      </div>
    <?php endfor; ?>
</div>
</body>
  </html>