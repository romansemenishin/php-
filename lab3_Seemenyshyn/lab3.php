<?php
    require '../../config.php';
    include 'function.php';
?>

<?php
$my_array = array('Рядок 1', 'Рядок 2','Рядок 3');
create_table2($my_array,3,8,8);
echo '<br>'. '<br>';

$arr = array();
$sum = 0;
$min = null;
$max = null;

for ($i = 0; $i < 10; $i++) {
    $arr[$i] = mt_rand(1, 10);
    echo "arr[$i]: {$arr[$i]}<br>";

    if ($min === null || $arr[$i] < $min) {
        $min = $arr[$i];
        $minIndex = $i;
    }
    if ($max === null || $arr[$i] > $max) {
        $max = $arr[$i];
        $maxIndex = $i;
    }

    $sum += $arr[$i];
}

$average = $sum / count($arr);

echo "<br><strong>Мінімальне значення:</strong> $min (Індекс: $minIndex)<br>";
echo "<strong>Максимальне значення:</strong> $max (Індекс: $maxIndex)<br>";
echo "<strong>Середнє значення:</strong> $average<br><br>";

$arr = [4, 2, 5, 7, 3];

foreach ($arr as $num) {
    echo "{$num} = " . ($num * $num) . "<br>" ;
}
echo "<br>";



$nums = [1, 3, 5, 8, 19];
$results = [];
foreach($nums as $num){
    $results[] = "$num=" . ($num ** 2) . ", $num=" . ($num ** 3);
}
echo '<h2><strong>Завдання 3: квадрати й куби чисел</strong></h2>';
create_table2($results);
$results2=[];
$ameba = 1;
for ($hours = 3; $hours <= 24; $hours += 3){
    $ameba *= 2;
    $results2[] = "Через $hours годин: $ameba клітин";
}

echo '<h2><strong>Завдання 4: ділення амеби</strong></h2>';
create_table2($results2);

$stipend = 1500;
$expenses = 2000;
$month = 10;
$debt = 0;
$results3 = [];

for($i = 1; $i <= $month; $i++){
    $shortage = $expenses - $stipend;
    $debt += $shortage;
    $results3[] = "Місяць $i: витрати = " . round($expenses, 2) . " грн, борг = $shortage грн";
    $expenses *= 1.02;
}
echo '<h2><strong>Розрахунок стипендії</strong></h2>';
create_table2($results3);
?>

<h2>Завдання 5:</h2>
<?php
$array = [10, 20, 30, 40, 50];
printArrayWithIndexes($array, 'normal');
echo "<br>";
printArrayWithIndexes($array, 'reverse');
echo "<hr>";

$a = 123; 
$N = ($a % 10 + 1) * 2;

$matrix = [];
for ($i = 0; $i < $N; $i++) {
    for ($j = 0; $j < $N; $j++) {
        $matrix[$i][$j] = rand(1, 100);
    }
}
print2DArrayInfo($matrix);
?>

<h3 class='back'><a style="text-decoration: none"href='task6.php'>Завдання 6</a></h3>
<h3 class='back'><a style="text-decoration: none"href='task7.php'>Завдання 7</a></h3>
<h3 class='back'><a style="text-decoration: none"href='<?= $config['base_url'] ?>'>Назад</a></h3>
