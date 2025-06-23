<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 3</title>
</head>
<body>
<h2>Завдання 3</h2>
<p><a href="lab5.php">Повернутися до лабораторної роботи 5</a></p>

<?php
$filename = "files/tag1.txt";

if(file_exists($filename)) {
    $file = fopen($filename, "r") or die("Не вдалося відкрити файл!");
    
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Тег</th><th>Опис</th></tr>";
    
    while(!feof($file)) {
        $tag = fgets($file);
        if(!feof($file)) {
            $description = fgets($file);
            
            if($tag && $description) {
                echo "<tr>";
                echo "<td>&lt;" . trim($tag) . "&gt;</td>";
                echo "<td>" . trim($description) . "</td>";
                echo "</tr>";
            }
        }
    }
    
    echo "</table>";
    
    fclose($file);
} else {
    echo "<p>Файл $filename не знайдено!</p>";
}
?>

</body>
</html>