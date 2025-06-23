<?php
require '../../config.php';
session_start();

if (!isset($db_server) || !$db_server) {
    die("Помилка: Не вдалося встановити з'єднання з базою даних.");
}

if (!isset($_SESSION['login']) || !isset($_SESSION['passwd'])) {
    header("Location: authorize.php");
    exit;
}

$login = mysqli_real_escape_string($db_server, $_SESSION['login']);
$passwd = mysqli_real_escape_string($db_server, $_SESSION['passwd']);

$query = "SELECT * FROM user_for_session WHERE login='$login' AND passwd='$passwd'";
$result = mysqli_query($db_server, $query);

if (mysqli_num_rows($result) == 0) {
    header("Location: authorize.php");
    exit;
}
?>
<html>
<head>
    <title>Інша секретна інформація</title>
</head>
<body>
<h2>Інша секретна інформація</h2>
<p><a href="lab11.php">Повернутися до лабораторної роботи 11</a></p>

<p>Це ще одна секретна сторінка, доступна тільки авторизованим користувачам.</p>

<p>Секретна інформація.</p>

<p>
    <a href="secret_info.php">Повернутися на першу секретну сторінку</a> (дані сесії збережуться)
</p>

<p>
    <a href="lab11.php?logout=1" onclick="return confirm('Ви впевнені? Дані сесії будуть видалені.')">Вийти на головну сторінку</a> (дані сесії будуть видалені)
</p>

<?php
if (isset($_SESSION['login'])) {
    echo "<p>Ви увійшли як користувач " . $_SESSION['login'] . "</p>";
} else {
    echo "<p>Ви увійшли як гість</p>";
}
?>

</body>
</html>
