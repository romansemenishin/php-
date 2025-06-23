<?php
require '../../config.php';
session_start();

if (!isset($db_server) || !$db_server) {
    die("Помилка: Не вдалося встановити з'єднання з базою даних.");
}

$create_table_query = "CREATE TABLE IF NOT EXISTS user_for_session (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) UNIQUE NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    full_name VARCHAR(100),
    email VARCHAR(100),
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!mysqli_query($db_server, $create_table_query)) {
    echo "Помилка створення таблиці: " . mysqli_error($db_server) . "<br>";
}
?>
<html>
<head>
    <title>Завдання 5-6</title>
</head>
<body>
<h2>Завдання 5-6</h2>
<p><a href="lab11.php">Повернутися до лабораторної роботи 11</a></p>

<p><a href="register.php">Перейти на окрему сторінку реєстрації</a></p>

<?php
if (isset($_SESSION['login'])) {
    echo "<p>Ви увійшли як користувач " . $_SESSION['login'] . "</p>";
} else {
    echo "<p>Ви увійшли як гість</p>";
}
?>

</body>
</html>