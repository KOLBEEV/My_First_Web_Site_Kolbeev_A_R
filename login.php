<?php
require_once('db.php');

if (isset($_COOKIE['User'])) {
    header("Location: profile.php");
    exit; // Обязательно добавьте exit после перенаправления
}

$link = mysqli_connect('db', 'root', '280200', 'first');

if (isset($_POST['submit'])) {
    $username = $_POST['login'];
    $pass = $_POST['password'];

    if (!$username || !$pass) die("Пожалуйста, введите все значения!");

    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$pass'";

    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
        setcookie("User", $username, time() + 7200);
        header('Location: profile.php');
        exit; // Обязательно добавьте exit после перенаправления
    } else {
        echo "Неправильные логин или пароль!";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Колбеев А. Р. - Авторизация</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icon@1.5.0/font/bootstrap-icons.css"/>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Авторизация</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="login.php">
                        <div class="row form__reg"><input class="form" type="text" name="login" placeholder="Login"></div>
                        <div class="row form__reg"><input class="form" type="password" name="password" placeholder="Password"></div>
                        <button type="submit" class="btn_red btn__reg" name="submit">Продолжить</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
