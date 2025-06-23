<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 4</title>
</head>
<body>
<h2>Завдання 4</h2>
<p><a href="lab5.php">Повернутися до лабораторної роботи 5</a></p>

<?php
$filename = "files/tag2.txt";
$outfile = "files/out.txt";

if(file_exists($filename)) {
    $lines = file($filename);
    $tagCount = count($lines);
    
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Тег</th><th>Опис</th></tr>";
    
    foreach($lines as $line) {
        $parts = explode(" ", $line, 2);
        if(count($parts) == 2) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($parts[0]) . "</td>";
            echo "<td>" . trim($parts[1]) . "</td>";
            echo "</tr>";
        }
    }
    
    echo "</table>";
    
    $outContent = "Всього у файлі tag2.txt описано тегів: $tagCount";
    file_put_contents($outfile, $outContent);
    
    if(file_exists($outfile)) {
        echo "<p>" . file_get_contents($outfile) . "</p>";
    }
} else {
    echo "<p>Файл $filename не знайдено!</p>";
}
?>

</body>
</html>