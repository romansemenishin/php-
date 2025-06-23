<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 5</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid black;
            padding: 8px 15px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>Завдання 5</h2>
<p><a href="lab8.php">Повернутися до лабораторної роботи 8</a></p>

<?php
class MultiplicationTable {
    private $number;
    
    public function __construct($number) {
        $this->number = $number;
    }
    
    public function calculate() {
        $results = [];
        for ($i = 1; $i <= 10; $i++) {
            $results[$i] = $this->number * $i;
        }
        return $results;
    }
    
    public function displayTable() {
        $results = $this->calculate();
        
        echo "<h3>Таблиця множення для числа {$this->number}</h3>";
        echo "<table>";
        echo "<tr><th>Множник</th><th>Результат</th></tr>";
        
        foreach ($results as $multiplier => $result) {
            echo "<tr>";
            echo "<td>{$this->number} × {$multiplier}</td>";
            echo "<td>{$result}</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }
}

$table5 = new MultiplicationTable(5);
$table5->displayTable();

$table7 = new MultiplicationTable(7);
$table7->displayTable();

$table9 = new MultiplicationTable(9);
$table9->displayTable();
?>

</body>
</html>