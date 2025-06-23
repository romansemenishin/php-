<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 5 - Лабораторна робота 4</title>
    <style>
        .highest { color: blue; font-weight: bold; }
        table { border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
<h2>Завдання 5</h2>

<h3>Частина 1: Вага спортсменок</h3>
<?php
$team1 = array(
    "Спортсменка 1" => 48,
    "Спортсменка 2" => 52,
    "Спортсменка 3" => 55,
    "Спортсменка 4" => 60,
    "Спортсменка 5" => 53
);

$team2 = array(
    "Спортсменка 6" => 51,
    "Спортсменка 7" => 57,
    "Спортсменка 8" => 62,
    "Спортсменка 9" => 49,
    "Спортсменка 10" => 56
);

echo "<h4>Команда 1:</h4>";
echo "<table>";
echo "<tr><th>Спортсменка</th><th>Вага (кг)</th></tr>";
foreach ($team1 as $name => $weight) {
    echo "<tr><td>$name</td><td>$weight</td></tr>";
}
echo "</table>";

echo "<h4>Команда 2:</h4>";
echo "<table>";
echo "<tr><th>Спортсменка</th><th>Вага (кг)</th></tr>";
foreach ($team2 as $name => $weight) {
    echo "<tr><td>$name</td><td>$weight</td></tr>";
}
echo "</table>";

$count_team1 = 0;
$count_team2 = 0;

foreach ($team1 as $weight) {
    if ($weight > 50 && $weight <= 57) {
        $count_team1++;
    }
}

foreach ($team2 as $weight) {
    if ($weight > 50 && $weight <= 57) {
        $count_team2++;
    }
}

echo "<h4>Результати аналізу ваги спортсменок:</h4>";
if ($count_team1 > 0) {
    echo "У команді 1 є $count_team1 спортсменок з вагою більше 50 кг, але не більше 57 кг.<br>";
} else {
    echo "У команді 1 немає спортсменок з вагою більше 50 кг, але не більше 57 кг.<br>";
}

if ($count_team2 > 0) {
    echo "У команді 2 є $count_team2 спортсменок з вагою більше 50 кг, але не більше 57 кг.<br>";
} else {
    echo "У команді 2 немає спортсменок з вагою більше 50 кг, але не більше 57 кг.<br>";
}

echo "<h3>Частина 2: Інформація про студентів та їх бали</h3>";

$students = array(
    "Молитовник" => array(
        "Математика" => 85,
        "Фізика" => 78,
        "Українська мова" => 92,
        "Англійська" => 88
    ),
    "Морис" => array(
        "Математика" => 92,
        "Фізика" => 85,
        "Українська мова" => 78,
        "Англійська" => 90
    ),
    "Назар" => array(
        "Математика" => 78,
        "Фізика" => 90,
        "Українська мова" => 95,
        "Англійська" => 82
    )
);

$highest_scores = array(
    "Математика" => 0,
    "Фізика" => 0,
    "Українська мова" => 0,
    "Англійська" => 0
);

foreach ($students as $student) {
    foreach ($student as $subject => $score) {
        if ($score > $highest_scores[$subject]) {
            $highest_scores[$subject] = $score;
        }
    }
}

echo "<table>";
echo "<tr><th>Прізвище</th><th>Математика</th><th>Фізика</th><th>Програмування</th><th>Англійська</th><th>Середній бал</th></tr>";

foreach ($students as $name => $subjects) {
    echo "<tr>";
    echo "<td>$name</td>";

    $total = 0;
    foreach ($subjects as $subject => $score) {
        $class = ($score == $highest_scores[$subject]) ? "highest" : "";
        echo "<td class='$class'>$score</td>";
        $total += $score;
    }

    $average = round($total / count($subjects), 2);
    echo "<td>$average</td>";
    echo "</tr>";
}

echo "</table>";

echo "<h4>Найвищі бали за предметами:</h4>";
echo "<ul>";
foreach ($highest_scores as $subject => $score) {
    echo "<li>$subject: <span class='highest'>$score</span></li>";
}
echo "</ul>";
?>

<h3 class='back'><a style="text-decoration: none" href='lab4.php'>Назад до лабораторної роботи 4</a></h3>
</body>
</html>
