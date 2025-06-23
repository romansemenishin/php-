<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 1</title>
</head>
<body>
<h2>Завдання 1</h2>
<p><a href="lab6.php">Повернутися до лабораторної роботи 6</a></p>

<h3>Весь заданий текст:</h3>
<?php
$text = file_get_contents('text.txt');
echo nl2br(htmlspecialchars($text));
?>

<h3>Тільки назви відкриваючих тегів:</h3>
<?php
preg_match_all('/<([a-zA-Z0-9]+)/', $text, $matches);
foreach ($matches[1] as $tag) {
    echo $tag . "<br>";
}
?>

<h3>Назви відкриваючих тегів разом з кутовими дужками:</h3>
<?php
preg_match_all('/<[a-zA-Z0-9]+>/', $text, $matches);
foreach ($matches[0] as $tag) {
    echo htmlspecialchars($tag) . "<br>";
}
?>

</body>
</html>