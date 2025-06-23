<?php
require '../../config.php';

if(isset($_POST['import'])) {
    $file = "files/news.txt";
    $fdata_my = fopen($file, "r") or die ("Не вдалося відкрити файл $file!");
    $mas = fread($fdata_my, filesize($file));
    fclose($fdata_my);
    
    $mas = explode("&", $mas);
    $count = 0;
    
    for ($i = 0; $i < count($mas); $i++) {
        if (trim($mas[$i]) != "") {
            $mas_vidm = explode("~", $mas[$i]);
            if (count($mas_vidm) >= 4) {
                $tema = mysqli_real_escape_string($db_server, trim($mas_vidm[0]));
                $zagol = mysqli_real_escape_string($db_server, trim($mas_vidm[1]));
                $content = mysqli_real_escape_string($db_server, trim($mas_vidm[2]));
                $time = mysqli_real_escape_string($db_server, trim($mas_vidm[3]));
                
                $res = mysqli_query($db_server, "INSERT INTO pivarchuk_news(tema, zagol, content, time) VALUES('$tema', '$zagol', '$content', '$time')");
                if ($res) {
                    $count++;
                } else {
                    echo "<p>Помилка при додаванні запису: " . mysqli_error($db_server) . "</p>";
                }
            }
        }
    }
    
    echo "<p>Успішно додано $count записів до таблиці pivarchuk_news.</p>";
}
?>

<html>
<head>
    <title>Завдання 2</title>
</head>
<body>
    <h2>Завдання 2</h2>
    <p>Занесення у таблицю pivarchuk_news новин, розміщених у файлі files/news.txt.</p>
    
    <form method="post">
        <input type="submit" name="import" value="Імпортувати дані з файлу">
    </form>
    
    <p><a href="lab10.php">Повернутися до лабораторної роботи 10</a></p>
</body>
</html>