<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Checkbox</title>
</head>
<body>
    <form action="proses.php" method="post">
        <label for="option1">Option 1</label>
        <input type="checkbox" name="options[]" value="Option 1" id="option1">
        
        <br>
        
        <label for="option2">Option 2</label>
        <input type="checkbox" name="options[]" value="Option 2" id="option2">
        
        <br>

        <label for="option3">Option 3</label>
        <input type="checkbox" name="options[]" value="Option 3" id="option3">

        <br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
