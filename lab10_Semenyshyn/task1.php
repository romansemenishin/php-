<?php
require '../../config.php';

if(isset($_POST['create'])) {
    mysqli_query($db_server, "DROP TABLE IF EXISTS pivarchuk_news");

    $result = mysqli_query($db_server, "CREATE TABLE pivarchuk_news (
        id INTEGER AUTO_INCREMENT PRIMARY KEY, 
        tema VARCHAR(100), 
        zagol VARCHAR(255) UNIQUE, 
        content TEXT, 
        time TIMESTAMP
    )");

    if($result) {
        echo "<p>Таблицю pivarchuk_news успішно створено!</p>";
    } else {
        echo "<p>Помилка при створенні таблиці: " . mysqli_error($db_server) . "</p>";
    }
}
?>

<html>
<head>
    <title>Завдання 1</title>
</head>
<body>
    <h2>Завдання 1</h2>
    <p>Створення таблиці pivarchuk_news із полями: порядковий номер, тематика, заголовки, контент, дата новин.</p>

    <form method="post">
        <input type="submit" name="create" value="Створити таблицю">
    </form>

    <p><a href="lab10.php">Повернутися до лабораторної роботи 10</a></p>
</body>
</html>
