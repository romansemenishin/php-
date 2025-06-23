<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 6</title>
</head>
<body>
<h2>Завдання 6</h2>
<p><a href="lab5.php">Повернутися до лабораторної роботи 5</a></p>

<?php
$text = "PHP - мова, яка може бути вбудованою безпосередньо в html-код сторінок, які, в свою чергу коректно будуть оброблені PHP -інтерпретатором. Механізм РНР просто починає виконувати код після першої екрануючої послідовності (<?) і продовжує виконання до того моменту, коли він зустріне парну екрануючу послідовність (?>).";

echo "<h3>Оригінальний текст:</h3>";
echo "<p>" . htmlspecialchars($text) . "</p>";

function removeTextInParentheses($text) {
    return preg_replace('/\((.*?)\)/', '()', $text);
}

$processedText = removeTextInParentheses($text);

echo "<h3>Текст після обробки (видалено текст у дужках, дужки залишено):</h3>";
echo "<p>$processedText</p>";
?>

</body>
</html>