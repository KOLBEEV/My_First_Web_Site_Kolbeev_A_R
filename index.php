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
        <?php
        if (!isset($_COOKIE['User'])) {
        ?>
            <div class="col-12 index">
            <h1>Авторизуйтесь!</h1>
            <a href="/registration.php">Зарегистрируйтесь</a> или <a href="/login.php">войдите</a>!
            </div>
        <?php
        } else {
            echo '<div class="col-12 index">';
            echo "<h1>Новости!</h1>";
            echo '</div>';
            echo '<div class="col-12 index">';
            // подключение к БД
            $link = mysqli_connect('db','root','280200','first');

            $sql = "SELECT * FROM posts";
            $res = mysqli_query($link, $sql);
            if (mysqli_num_rows( $res) > 0) {
                while ($post = mysqli_fetch_array($res)) {
                    echo "<a href='/posts.php?id=" . $post["id"] . "'>" . $post['title'] . "</a><br>";
                }
            } else {
                echo "Записей пока нет";
            }
        }
        ?>
        </div>
    </div>
    </body>
</html>
