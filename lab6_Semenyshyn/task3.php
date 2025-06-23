<?php
require '../../config.php';

function removeTags($html) {
    $text = preg_replace('/<[^>]+>/', ' ', $html);
    $text = preg_replace('/\s+/', ' ', $text);
    return trim($text);
}
?>
<html>
<head>
    <title>Завдання 3</title>
</head>
<body>
<h2>Завдання 3</h2>
<p><a href="lab6.php">Повернутися до лабораторної роботи 6</a></p>

<form method="post">
    <p>Введіть HTML текст, який починається і закінчується тегом body:</p>
    <textarea name="htmlText" rows="10" cols="80"><?php echo isset($_POST['htmlText']) ? htmlspecialchars($_POST['htmlText']) : '<body>
    <h1>Приклад HTML тексту</h1>
    <p>Це <strong>приклад</strong> HTML тексту з <em>різними</em> тегами.</p>
    <ul>
        <li>Перший пункт</li>
        <li>Другий пункт</li>
    </ul>
</body>'; ?></textarea>
    <br>
    <input type="submit" value="Обробити текст">
</form>

<?php
if (isset($_POST['htmlText']) && !empty($_POST['htmlText'])) {
    $htmlText = $_POST['htmlText'];
    $processedText = removeTags($htmlText);
    
    echo "<h3>Результат обробки:</h3>";
    echo "<p>" . htmlspecialchars($processedText) . "</p>";
}
?>

</body>
</html>