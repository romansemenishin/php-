<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 6</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px 0;
            width: 400px;
        }
        td {
            border: 1px solid black;
            padding: 8px 15px;
        }
        .label {
            font-weight: bold;
            background-color: #f2f2f2;
            width: 150px;
        }
        .country-table {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<h2>Завдання 6</h2>
<p><a href="lab8.php">Повернутися до лабораторної роботи 8</a></p>

<?php
class Country {
    public $name;
    public $population;
    public $capital;
    
    public function __construct($name, $population, $capital) {
        $this->name = $name;
        $this->population = $population;
        $this->capital = $capital;
    }
    
    public function displayInfo() {
        echo "<div class='country-table'>";
        echo "<table>";
        echo "<tr><td class='label'>Назва країни</td><td>{$this->name}</td></tr>";
        echo "<tr><td class='label'>Населення</td><td>{$this->population}</td></tr>";
        echo "<tr><td class='label'>Столиця</td><td>{$this->capital}</td></tr>";
        echo "</table>";
        echo "</div>";
    }
}

$countries = [
    new Country("Польща", "37,8 млн", "Варшава"),
    new Country("Португалія", "10,3 млн", "Лісабон"),
    new Country("Пакистан", "220,9 млн", "Ісламабад"),
    new Country("Перу", "32,5 млн", "Ліма")
];

echo "<h3>Країни на літеру 'П':</h3>";

foreach ($countries as $country) {
    $country->displayInfo();
}
?>

</body>
</html>