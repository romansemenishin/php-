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
    <title>Секретна інформація</title>
</head>
<body>
<h2>Секретна інформація</h2>
<p><a href="lab11.php">Повернутися до лабораторної роботи 11</a></p>

<p>Це секретна сторінка, доступна тільки авторизованим користувачам.</p>

<p>Секретна інформація.</p>

<p><a href="secret_other.php">Перейти на іншу секретну сторінку</a></p>

<?php
if (isset($_SESSION['login'])) {
    echo "<p>Ви увійшли як користувач " . $_SESSION['login'] . "</p>";
} else {
    echo "<p>Ви увійшли як гість</p>";
}
?>

</body>
</html>
