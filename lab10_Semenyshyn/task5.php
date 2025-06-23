<?php
require '../../config.php';

$message = "";

if(isset($_POST['delete'])) {
    $result = mysqli_query($db_server, "DELETE FROM pivarchuk_news WHERE id = 3");
    if($result) {
        $message = "<p>Новину з порядковим номером 3 успішно видалено.</p>";
    } else {
        $message = "<p>Помилка при видаленні новини: " . mysqli_error($db_server) . "</p>";
    }
}
?>

<html>
<head>
    <title>Завдання 5</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Завдання 5</h2>
    <p>Видалення новини з порядковим номером 3 та виведення всіх записів із таблиці pivarchuk_news.</p>
    
    <form method="post">
        <input type="submit" name="delete" value="Видалити новину з порядковим номером 3">
    </form>
    
    <?php echo $message; ?>
    
    <h3>Всі записи з таблиці pivarchuk_news:</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Тематика</th>
            <th>Заголовок</th>
            <th>Дата</th>
        </tr>
        <?php
        $query_res = mysqli_query($db_server, "SELECT id, tema, zagol, time FROM pivarchuk_news ORDER BY id");
        
        if(mysqli_num_rows($query_res) > 0) {
            while($row = mysqli_fetch_assoc($query_res)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['tema'] . "</td>";
                echo "<td>" . $row['zagol'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Немає даних у таблиці</td></tr>";
        }
        ?>
    </table>
    
    <p><a href="lab10.php">Повернутися до лабораторної роботи 10</a></p>
</body>
</html>