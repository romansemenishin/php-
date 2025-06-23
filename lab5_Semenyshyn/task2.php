<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 2</title>
</head>
<body>
<h2>Завдання 2</h2>
<p><a href="lab5.php">Повернутися до лабораторної роботи 5</a></p>

<?php
$message = "";
$fileContent = "";
$fileInfo = "";

if(isset($_POST['filename']) && !empty($_POST['filename'])) {
    $filename = $_POST['filename'];
    
    if(file_exists($filename)) {
        $message = "Файл з іменем $filename у поточному каталозі існує.";
        $fileInfo = "
            <p><strong>Інформація про файл:</strong></p>
            <ul>
                <li>Розмір: " . filesize($filename) . " байт</li>
                <li>Час створення: " . date("d.m.Y H:i:s", filectime($filename)) . "</li>
                <li>Час останньої модифікації: " . date("d.m.Y H:i:s", filemtime($filename)) . "</li>
            </ul>
        ";
        
        $fileContent = "<p><strong>Вміст файлу:</strong></p><pre>" . htmlspecialchars(file_get_contents($filename)) . "</pre>";
    } else {
        $message = "Файл з іменем $filename у поточному каталозі не існує.";
    }
}
?>

<form method="post" action="task2.php">
    <label for="filename">Введіть ім'я файлу:</label>
    <input type="text" name="filename" id="filename" placeholder="pivarchuk_lab5.php">
    <input type="submit" value="Готово">
</form>

<?php
if(!empty($message)) {
    echo "<div style='margin-top: 20px;'>";
    echo "<p>$message</p>";
    echo $fileInfo;
    echo $fileContent;
    echo "</div>";
}
?>

</body>
</html>