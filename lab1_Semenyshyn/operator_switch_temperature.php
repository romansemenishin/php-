<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("../../config.php");
//include_once("../db.php");
// include_once("../function.php");
header("Content-Type: text/html; charset=".$config["charset"]);

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Обчислення температури</title>
</head>
<body>
    <h2>Введіть номер завдання:</h2>
    <p>1 - обчислення максимальної температури</p>
    <p>2 - обчислення мінімальної температури</p>
    <p>3 - обчислення середньої температури</p>
    
    <form action="" method="post">
        <label>Температура 1:</label>
        <input type="number" name="temp1" required><br>
        <label>Температура 2:</label>
        <input type="number" name="temp2" required><br>
        <label>Температура 3:</label>
        <input type="number" name="temp3" required><br>
        <label>Номер завдання (1-3):</label>
        <input type="number" name="task" min="1" max="3" required><br>
        <button type="submit">Обчислити</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp1 = (int)$_POST["temp1"];
        $temp2 = (int)$_POST["temp2"];
        $temp3 = (int)$_POST["temp3"];
        $task = (int)$_POST["task"];
        
        switch ($task) {
            case 1:
                $result = max($temp1, $temp2, $temp3);
                echo "<p>Максимальна температура: $result</p>";
                break;
            case 2:
                $result = min($temp1, $temp2, $temp3);
                echo "<p>Мінімальна температура: $result</p>";
                break;
            case 3:
                $result = ($temp1 + $temp2 + $temp3) / 3;
                echo "<p>Середня температура: $result</p>";
                break;
            default:
                echo "<p>Помилка: Невірний номер завдання!</p>";
        }
    }
    ?>

<h3 class='back'><a href='lab1.php'>Назад</a></h3>
<h3 class='back'><a href='<?= $config['base_url'] ?>'>На головну сторінку дисципліни</a></h3>

</body>
</html>
