<?php 
$conn = mysqli_connect('127.0.0.1', 'root', '', 'coba');
if(isset($_POST['submit'])){
    var_dump($_POST['gendre']);
}
// $query = "INSERT INTO gendre ()"
$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'coba' AND TABLE_NAME = 'gendre' AND COLUMN_NAME NOT IN ('id', 'date');";

$required = mysqli_query($conn, $query);

$rows = [];
while( $row = mysqli_fetch_row($required) ){
    $rows[] = $row[0];
}

var_dump($rows);
echo '<hr>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .form-input{
            margin: 10px 20px;
        }

        button{
            width: 100px;
            height: 30px;
            margin-top: 20px;
            margin-left: 100px;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
    <?php foreach($rows as $gendre) : ?>
        <div class="form-input">
            <label for="<?= $gendre ?>"><?= $gendre ?></label>
            <input type="checkbox" name="gendre[]" id="<?= $gendre ?>" value="<?= $gendre ?>">
        </div>
    <?php endforeach; ?>
        <!-- <div class="form-input">
            <label for="gendre2">Gendre 2</label>
            <input type="checkbox" name="gendre[]" id="gendre2" value="gendre2">
        </div>
        <div class="form-input">
            <label for="gendre3">Gendre 3</label>
            <input type="checkbox" name="gendre[]" id="gendre3" value="gendre3">
        </div>
        <button type="submit" name="submit" id="submit">submit</button> -->
    </form>
</body>
</html>
