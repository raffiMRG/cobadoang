<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    *{
        margin: 0;
        padding: 0;
    }

    /* .kotak1{
        background-color: green;
        width: fit-content;
        padding: 10px;
    }
    .kotak2{
        background-color: yellow;
        width: 100px;
        height: 100px;
    } */
    
    .kotak0{
        background-color: aqua;
        width: 100px;
        height: 100px;
        align-items: center;
        position: fixed;
    }
    
    .kotak1{
        /* position: relative; */
        left: 10px;
        background-color: green;
        width: 150px;
        height: 150px;
        padding: 10px;
    }
    .kotak2{
        background-color: yellow;
        width: 100px;
        height: 100px;
        align-items: center;
        /* position: absolute; */
    }
    .kotak3{
        background-color: red;
        width: 100px;
        height: 100px;
        align-items: center;
        /* position: absolute; */
    }
</style>

</head>
<body>
    
    <div class="kotak0"></div>
    <div class="kotak1">
        <div class="kotak2">
        </div>
    </div>
    <div class="kotak3"></div>

</body>
</html>