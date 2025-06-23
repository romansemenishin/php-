<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 1 - Лабораторна робота 4</title>
</head>
<body>
<h2>Завдання 1</h2>

<?php
$squares = array();
echo "<h3>Перший масив (квадрати чисел від 10 до 20):</h3>";
echo "<ul>";
for ($i = 10; $i <= 20; $i++) {
    $squares[] = $i * $i;
    echo "<li>$i<sup>2</sup> = " . $squares[count($squares) - 1] . "</li>";
}
echo "</ul>";

$cubes = array();
echo "<h3>Другий масив (куби чисел від 1 до 10):</h3>";
echo "<ul>";
for ($i = 1; $i <= 10; $i++) {
    $cubes[] = $i * $i * $i;
    echo "<li>$i<sup>3</sup> = " . $cubes[count($cubes) - 1] . "</li>";
}
echo "</ul>";

$combined = array_merge($squares, $cubes);

echo "<h3>Об'єднаний масив:</h3>";
echo "<ol>";
foreach ($combined as $value) {
    echo "<li>$value</li>";
}
echo "</ol>";
?>

<h3 class='back'><a style="text-decoration: none" href='lab4.php'>Назад до лабораторної роботи 4</a></h3>
</body>
</html>
