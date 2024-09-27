<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Колбеев А. Р.</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icon@1.5.0/font/bootstrap-icons.css"/>
        <link rel="stylesheet" href="css/istyle.css">
    </head>
    <body>
    <div class="row">
        <div class="col-12 index">
            <h1>Авторизуйтесь!</h1>
        <?php
        if (!isset($_COOKIE['User'])) {
        ?>
            <a href="/registration.php">Зарегистрируйтесь</a> или <a href="/login.php">войдите</a>!
        <?php
        } else {
            // подключение к БД
        }
        ?>
        </div>
    </div>
    </body>
</html>
