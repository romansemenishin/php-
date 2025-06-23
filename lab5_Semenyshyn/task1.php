<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 1</title>
</head>
<body>
<h2>Завдання 1</h2>
<p><a href="lab5.php">Повернутися до лабораторної роботи 5</a></p>

<h3>Приклад 1: Включення зовнішніх файлів</h3>
<?php
$content = "echo \"<h4>Це вміст включеного файлу</h4>\";";
file_put_contents("files/included.php", "<?php " . $content . " ?>");
include 'files/included.php';
?>

<h3>Приклад 2: Аналіз файлів</h3>
<?php
$file = "files/included.php";
if(file_exists($file)) {
    echo "$file - " . (is_file($file) ? "" : "не ") . "файл<br>";
    echo "$file - " . (is_dir($file) ? "" : "не ") . "каталог<br>";
    echo "$file " . (is_readable($file) ? "" : "не ") . "доступний для читання<br>";
    echo "$file " . (is_writable($file) ? "" : "не ") . "доступний для запису<br>";
    echo "розмір $file в байтах - " . (filesize($file)) . "<br>";
    echo "остання зміна $file - " . (date("d M Y H:i", filemtime($file))) . "<br>";
    echo "останнє звернення до $file - " . (date("d M Y H:i", fileatime($file))) . "<br>";
}
?>

<h3>Приклад 3: Запис і додавання в файл</h3>
<?php
$fp = fopen("files/example.txt", "w") or die("Не вдалося відкрити файл");
fputs($fp, "Запис в файл\n");
fclose($fp);

$fp = fopen("files/example.txt", "a") or die("Не вдалося відкрити файл");
fputs($fp, "Додавання в кінець файлу");
fclose($fp);

echo "Файл успішно створено і доповнено";
?>

<h3>Приклад 4: Читання рядків з файлу</h3>
<?php
$fp = fopen("files/example.txt", "r") or die("Не вдалося відкрити файл!");
while(!feof($fp)) {
    echo fgets($fp, 1024) . "<br>";
}
fclose($fp);
?>

<h3>Приклад 5: Використання функції file()</h3>
<?php
$arr = file("files/example.txt");
echo "<strong>Вміст файлу через функцію file():</strong><br>";
for($i = 0; $i < count($arr); $i++) {
    echo $arr[$i] . "<br>";
}
?>

<h3>Приклад 8: Завантаження файлу на сервер</h3>
<?php
$uploaddir = "./files/";
if(isset($_FILES['uploadfile']) && $_FILES['uploadfile']['name'] != "") {
    $uploadfile = $uploaddir . basename($_FILES['uploadfile']['name']);
    
    if(copy($_FILES['uploadfile']['tmp_name'], $uploadfile)) {
        echo "<p>Файл завантажений на сервер</p>";
    } else {
        echo "<p>Файл не завантажений на сервер!</p>";
    }
    
    echo "<p>Оригінальна назва: " . $_FILES['uploadfile']['name'] . "</p>";
    echo "<p>Тип файлу: " . $_FILES['uploadfile']['type'] . "</p>";
    echo "<p>Розмір: " . $_FILES['uploadfile']['size'] . "</p>";
    echo "<p>Тимчасове ім'я: " . $_FILES['uploadfile']['tmp_name'] . "</p>";
}
?>

<div align="center">
    <form action="task1.php" method="post" enctype="multipart/form-data">
        <input type="file" name="uploadfile">
        <input type="submit" value="Завантажити">
    </form>
</div>

</body>
</html>