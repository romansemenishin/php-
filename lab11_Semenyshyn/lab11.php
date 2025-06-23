<?php
require '../../config.php';
session_start();

if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    session_unset();
    session_destroy();
}
?>
<html>
<head>
    <title>Лабораторна робота 11</title>
</head>
<body>
<h2>Лабораторна робота 11</h2>
<ul>
    <li><a href="task2.php">Завдання 2</a></li>
    <li><a href="task3-4.php">Завдання 3-4</a></li>
    <li><a href="task5-6.php">Завдання 5-6</a></li>
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
