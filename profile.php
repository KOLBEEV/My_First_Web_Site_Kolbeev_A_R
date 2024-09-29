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
                Привет, <?php echo htmlspecialchars($_COOKIE['User']); ?>
            </h1>
        </div>
        <div class="col-12">
            <form class="form_align" method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                <input type="text" class="form" name="title" placeholder="Заголовок вашего поста" required>
                <textarea name="text" cols="30" rows="10" placeholder="Введите текст вашего поста ..." required></textarea>
                <input type="file" name="file" /><br>
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

$link = mysqli_connect('db', 'root', '280200', 'first');

if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $main_text = $_POST['text'];
    $image_path = null;

    if (empty($title) || empty($main_text)) {
        die("Заполните все поля");
    }

    // Проверяем, загружен ли файл
    if (!empty($_FILES["file"]["name"])) {
        // Проверка типа файла и его размера
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
            || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
            || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
            && (@$_FILES["file"]["size"] < 104857600)) {  
            
            // Генерируем уникальное имя для файла, чтобы избежать коллизий
            $image_path = "upload/" . uniqid() . "_" . $_FILES["file"]["name"];
            
            // Перемещаем загруженный файл в нужную директорию
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $image_path)) {
                echo "Изображение успешно загружено: " . htmlspecialchars($image_path);
            } else {
                die("Не удалось загрузить изображение.");
            }
        } else {
            die("Недопустимый тип файла или слишком большой размер.");
        }
    }

    // Подготовленное выражение
    $stmt = mysqli_prepare($link, "INSERT INTO posts (title, main_text, image_path) VALUES (?, ?, ?)");
    
    // Связываем параметры
    mysqli_stmt_bind_param($stmt, "sss", $title, $main_text, $image_path);
    
    // Выполняем запрос
    if (!mysqli_stmt_execute($stmt)) {
        die("Ошибка добавления поста: " . mysqli_stmt_error($stmt));
    } else {
        echo "Пост успешно добавлен!";
    }
    
    // Закрываем подготовленное выражение
    mysqli_stmt_close($stmt);
}

mysqli_close($link);
?>
