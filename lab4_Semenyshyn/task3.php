<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 3 - Лабораторна робота 4</title>
</head>
<body>
<h2>Завдання 3</h2>

<?php
$my_topic = array(
    2 => "Ліжко",
    3 => "Стіл",
    4 => "Диван",
    5 => "Шафа"
);

echo "<h3>Початковий масив меблів:</h3>";
echo "<ul>";
foreach ($my_topic as $index => $value) {
    echo "<li>Індекс $index => Значення \"$value\"</li>";
}
echo "</ul>";

$flipped_array = array_flip($my_topic);

echo "<h3>Масив після заміни індексів та значень:</h3>";
echo "<ul>";
foreach ($flipped_array as $index => $value) {
    echo "<li>Індекс \"$index\" => Значення $value</li>";
}
echo "</ul>";
?>

<h3 class='back'><a style="text-decoration: none" href='lab4.php'>Назад до лабораторної роботи 4</a></h3>
</body>
</html>
