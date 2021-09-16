<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" style="margin: 30%;">
        <input type="text" name="text">
        <input type="submit" name="submit" id="submit">
    </form>
</body>
</html>
<?php
    if(isset($_POST['text']))
    $text = $_POST['text'];
    
?>