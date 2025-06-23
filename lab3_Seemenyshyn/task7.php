
<?php
$randNum = rand(1, 6);

echo "<a href='task7.php?num=$randNum'>Виклик функції (випадкове число: $randNum)</a><br><br>";

if (isset($_GET['num'])) {
    $num = $_GET['num'];

    switch ($num) {
        case 1:
            echo "Викликати функцію func1";
            break;
        case 2:
            echo "Викликати функцію func2";
            break;
        case 3:
            echo "Викликати функцію func3";
            break;
        default:
            echo "Некоректні дані";
    }
}
?>
<h3 class='back'><a style="text-decoration: none"href='lab3.php'>Назад</a></h3>
<h3 class='back'><a style="text-decoration: none"href='<?= $config['base_url'] ?>'>На головну</a></h3>
