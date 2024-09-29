<?php
$link = mysqli_connect("db","root","280200","first");
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id=$id";
$res = mysqli_query($link,$sql);
$rows = mysqli_fetch_array( $res );
$title = $rows['title'];
$main_text = $rows['main_text'];
$image = $rows['image_path'];
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Колбеев А. Р.</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icon@1.5.0/font/bootstrap-icons.css"/>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/profile.css">
    </head>
    <body>
        <?php
        echo "<h1> $title </h1>";
        echo "<p> $main_text </p>";
        echo "<img src='$image'>";
        ?>
    </body>
</html>
