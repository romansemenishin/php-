<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 4 - Лабораторна робота 4</title>
</head>
<body>
<h2>Завдання 4</h2>

<?php
$country = array();
$country["Ukraine"] = array("name" => "Україна", "capital" => "Київ", "popul" => "43.79");
$country["Poland"] = array("name" => "Польща", "capital" => "Варшава", "popul" => "37.75");
$country["Germany"] = array("name" => "Німеччина", "capital" => "Берлін", "popul" => "83.2");

echo "<h3>Таблиця з даними про країни:</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Назва</th><th>Столиця</th><th>Населення, млн.ч.</th></tr>";

foreach ($country as $key => $value) {
    echo "<tr>";
    echo "<td>{$value['name']}</td>";
    echo "<td>{$value['capital']}</td>";
    echo "<td>{$value['popul']}</td>";
    echo "</tr>";
}

echo "</table>";

echo "<h3>Речення про кожну країну:</h3>";
foreach ($country as $key => $value) {
    echo "Столиця {$value['name']} — {$value['capital']}, населення — {$value['popul']} млн. ч.<br>";
}

ksort($country);
echo "<h3>Ключі першого та другого рівнів (після сортування):</h3>";

foreach ($country as $key => $value) {
    echo "$key:<br>";
    foreach ($value as $subKey => $subValue) {
        echo "&nbsp;&nbsp;$subKey => $subValue<br>";
    }
    echo "<br>";
}
?>

<h3 class='back'><a style="text-decoration: none" href='lab4.php'>Назад до лабораторної роботи 4</a></h3>
</body>
</html>
