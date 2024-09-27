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
        <div class="container nav_bar">
            <div class="row">
                <div class="col-3 nav_logo">
                    <a class="navbar-brand" href="#">
                        <img src="image/logo.png" alt="Логотип" width="60" height="32" class="d-inline-block align-text-top">
                        Колбеев Артем
                    </a>
                </div>
                <div class="col-9">
                    <div class="nav_text">Информация обо мне!</div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h2>Колбеев Артём, студент 4 курса Севастопольского государственного университета по специальности 10.03.01 "Информационная безопасность".
                        Прохожу первый этап в PT.START.
                    </h2>
                </div>
                <div class="col-4">
                    <div class="row">
                        <img class="img_size" src="image/photo.jpg" alt="my_photo" id="image">
                    </div>
                    <div class="row">
                        <p class="title_photo">Колбеев А. Р.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Кнопка для добавления/удаления изображения -->
        <div class="container text-center my-4">
            <button class="btn btn-primary" id="toggleButton">Добавить изображение</button>
        </div>

        <!-- Контейнер для добавляемого изображения -->
        <div class="container text-center" id="imageContainer"></div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="hello">
                        Привет, <?php echo $_COOKIE['User']; ?>
                    </h1>
                </div>
                <div class="col-12">
                    <form method="POST" action="profile.php">
                        <input type="text" class="form" name="title" placeholder="Заголовок вашего поста">
                        <textarea name="text" cols="30" rows="10" placeholder="Введите текст вашего поста ..."></textarea>
                        <button type="submit" class="btn_red" name="submit">Сохранить пост!</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Подключение JS-файла -->
        <script src="script/button.js"></script>
    </body>
</html>

<?php
require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', '280200', 'first');

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $mail_text = $_POST['text'];

    if (!$title || $mail_text) die ("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if(!mysqli_query($link,$sql)) die ("Не удалось добавить пост");
}
?>
