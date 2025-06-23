<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 2 - Лабораторна робота 4</title>
</head>
<body>
<h1>Використання циклу foreach</h1>
<?php
$names["Бойчук"] = "Іван";
$names["Мельник"] = "Борис"; 
$names["Швець"] = "Антон";

foreach ($names as $key => $value) {
    echo "<b>$value $key</b><br>";
}
?>

<h3 class='back'><a style="text-decoration: none" href='lab4.php'>Назад до лабораторної роботи 4</a></h3>
</body>
</html>
