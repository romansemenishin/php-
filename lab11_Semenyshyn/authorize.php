<?php
require '../../config.php';
session_start();

if (!isset($db_server) || !$db_server) {
    die("Помилка: Не вдалося встановити з'єднання з базою даних.");
}

if (!isset($_POST['go'])) {
    ?>
    <html>
    <head>
        <title>Авторизація</title>
    </head>
    <body>
    <h2>Авторизація</h2>
    <p><a href="lab11.php">Повернутися до лабораторної роботи 11</a></p>

    <form method="post">
        Логін: <input type="text" name="login"><br>
        Пароль: <input type="password" name="passwd"><br>
        <input type="submit" name="go" value="Увійти">
    </form>

    <?php
    if (isset($_SESSION['login'])) {
        echo "<p>Ви увійшли як користувач " . $_SESSION['login'] . "</p>";
    } else {
        echo "<p>Ви увійшли як гість</p>";
    }
    ?>

    </body>
    </html>
    <?php
} else {
    $login = mysqli_real_escape_string($db_server, $_POST['login']);
    $passwd = mysqli_real_escape_string($db_server, $_POST['passwd']);

    $query = "SELECT * FROM user_for_session WHERE login='$login' AND passwd='$passwd'";
    $result = mysqli_query($db_server, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['login'] = $login;
        $_SESSION['passwd'] = $passwd;
        header("Location: secret_info.php");
        exit;
    } else {
        unset($_SESSION['login']);
        unset($_SESSION['passwd']);
        ?>
        <html>
        <head>
            <title>Помилка авторизації</title>
        </head>
        <body>
        <h2>Помилка авторизації</h2>
        <p>Неправильний логін або пароль. <a href="authorize.php">Спробуйте ще раз</a>.</p>
        <p><a href="lab11.php">Повернутися до лабораторної роботи 11</a></p>
        <p>Ви увійшли як гість</p>
        </body>
        </html>
        <?php
    }
}
?>
