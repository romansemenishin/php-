<?php

function create_table2($data, $border=1, $cellpadding=4, $cellspacing=4)
{
	echo "<h4> Результат виклику функції create_table2: </h4> border=$border";
	echo "<table border=$border  cellpadding=$cellpadding cellspacing=$cellspacing>\n";
	reset($data); //    встановлює покажчик масиву на його початок
	$value=current($data);//current повертає поточний елемент масиву
	while($value)
	{
		echo "<tr><td>$value</td></tr>\n";
		$value = next($data);
		//next - переміщують показник на елемент вперед на один елемент; 
		//next – спочатку змінює покажчик, потім – повертає значення, each–навпаки;
	}
	echo '</table>';
	echo"<div>Кількість параметрів:". func_num_args()."<br />";
	//Функція func_num_args() визначає, скільки аргументів було передано функції користувача
	$args = func_get_args();
	//func_get_args() повертає масив, який містить ці аргументи
	foreach ($args as $arg)
		echo $arg."<br/>";
	echo "</div>";
}

function printArrayWithIndexes($array, $order = 'normal') {
    if ($order === 'reverse') {
        $array = array_reverse($array, true);
    }

    echo "<strong>Виведення масиву ($order):</strong><br>";
    foreach ($array as $index => $value) {
        echo "Індекс $index => Значення $value<br>";
    }
}

function print2DArrayInfo($matrix) {
    echo "<strong>Двовимірний масив:</strong><br>";
    echo "<table border='1' cellpadding='6'>";
    foreach ($matrix as $row) {
        echo "<tr>";
        foreach ($row as $val) {
            echo "<td>$val</td>";
        }
        echo "</tr>";
    }
    echo "</table><br>";

    $min_row_values = [];
    $last_column_values = [];

    foreach ($matrix as $row) {
        $min_row_values[] = min($row);
        $last_column_values[] = end($row);
    }

    echo "<strong>Мінімальні значення рядків:</strong><br>";
    echo implode(", ", $min_row_values) . "<br>";

    echo "<strong>Значення останнього стовпця:</strong><br>";
    echo implode(", ", $last_column_values) . "<br>";
}

function echo_fun($n) {
    echo "<br><strong>Масив квадратів перших $n натуральних чисел:</strong><br>";
    for ($i = 1; $i <= $n; $i++) {
        echo "Індекс: $i => Значення: " . ($i * $i) . "<br>";
    }
}

?>

