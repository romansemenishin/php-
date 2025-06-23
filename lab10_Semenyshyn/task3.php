<?php
require '../../config.php';

if(isset($_POST['add'])) {
    $current_year = date("Y");
    
    $news_data = [
        [
            'tema' => 'Політика',
            'zagol' => 'Україна продовжує отримувати підтримку від міжнародних партнерів',
            'content' => 'Міжнародні партнери продовжують надавати Україні фінансову та військову допомогу для протидії російській агресії.',
            'time' => "$current_year-05-10 10:00:00"
        ],
        [
            'tema' => 'Економіка',
            'zagol' => 'Національний банк України прогнозує зростання ВВП',
            'content' => 'За прогнозами НБУ, економіка України може зрости на 3-4% у поточному році завдяки відновленню виробництва та експорту.',
            'time' => "$current_year-05-10 11:00:00"
        ],
        [
            'tema' => 'Події',
            'zagol' => 'У Києві відбувся міжнародний форум з відбудови України',
            'content' => 'У столиці України пройшов міжнародний форум, присвячений питанням відбудови країни після війни. У заході взяли участь представники понад 40 країн.',
            'time' => "$current_year-05-10 12:00:00"
        ],
        [
            'tema' => 'Технології',
            'zagol' => 'Українські IT-компанії демонструють стійкість під час війни',
            'content' => 'Незважаючи на складні умови, українська IT-галузь продовжує працювати та розвиватися, забезпечуючи значні надходження до бюджету країни.',
            'time' => "$current_year-05-10 13:00:00"
        ]
    ];
    
    $count = 0;
    foreach($news_data as $news) {
        $tema = mysqli_real_escape_string($db_server, $news['tema']);
        $zagol = mysqli_real_escape_string($db_server, $news['zagol']);
        $content = mysqli_real_escape_string($db_server, $news['content']);
        $time = mysqli_real_escape_string($db_server, $news['time']);
        
        $res = mysqli_query($db_server, "INSERT INTO pivarchuk_news(tema, zagol, content, time) VALUES('$tema', '$zagol', '$content', '$time')");
        if($res) {
            $count++;
        } else {
            echo "<p>Помилка при додаванні запису: " . mysqli_error($db_server) . "</p>";
        }
    }
    
    echo "<p>Успішно додано $count нових записів до таблиці pivarchuk_news.</p>";
}
?>

<html>
<head>
    <title>Завдання 3</title>
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
    <h2>Завдання 3</h2>
    <p>Додавання нових новин за поточний рік та виведення всіх даних із таблиці pivarchuk_news.</p>
    
    <form method="post">
        <input type="submit" name="add" value="Додати нові новини за поточний рік">
    </form>
    
    <h3>Всі новини з таблиці pivarchuk_news:</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Тематика</th>
            <th>Заголовок</th>
            <th>Контент</th>
            <th>Дата</th>
        </tr>
        <?php
        $query_res = mysqli_query($db_server, "SELECT * FROM pivarchuk_news ORDER BY time DESC");
        
        if(mysqli_num_rows($query_res) > 0) {
            while($row = mysqli_fetch_assoc($query_res)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['tema'] . "</td>";
                echo "<td>" . $row['zagol'] . "</td>";
                echo "<td>" . $row['content'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Немає даних у таблиці</td></tr>";
        }
        ?>
    </table>
    
    <p><a href="lab10.php">Повернутися до лабораторної роботи 10</a></p>
</body>
</html>