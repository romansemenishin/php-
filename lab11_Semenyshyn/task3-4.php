<?php
require '../../config.php';
session_start();
?>
<html>
<head>
    <title>Завдання 3-4</title>
</head>
<body>
<h2>Завдання 3-4</h2>
<p><a href="lab11.php">Повернутися до лабораторної роботи 11</a></p>

<p>Посилання на сторінки:</p>
<ul>
    <li><a href="authorize.php">Авторизація</a></li>
    <li><a href="secret_info.php">Секретна інформація</a> (доступна тільки авторизованим користувачам)</li>
    <li><a href="secret_other.php">Інша секретна інформація</a> (доступна тільки авторизованим користувачам)</li>
</ul>

<?php
if (isset($_SESSION['login'])) {
    echo "<p>Ви увійшли як користувач " . $_SESSION['login'] . "</p>";
} else {
    echo "<p>Ви увійшли як гість</p>";
}
?>

</body>
</html>
