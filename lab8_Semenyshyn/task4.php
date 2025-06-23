<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 4</title>
</head>
<body>
<h2>Завдання 4</h2>
<p><a href="lab8.php">Повернутися до лабораторної роботи 8</a></p>

<?php
class Student {
    public $name;
    public $surname;
    public $group;
    
    public function __construct($name, $suname, $group) {
        $this->name = $name;
        $this->surname = $suname;
        $this->group = $group;
    }
    
    public function __clone() {
        $this->name = "Новий студент";
        $this->surname = "Новий";
        $this->group = "Нова група";
    }
    
    public function getInfo() {
        echo "<p>Ім'я: {$this->name}, Прізвище: {$this->surname}, Група: {$this->group}</p>";
    }
}

$student1 = new Student("Павло", "Молитовник", "ІПЗ-23");
$student2 = new Student("Денис", "Морис", "ІПЗ-23");
$student3 = new Student("Софія", "Василюк", "ІПЗ-21");
$student4 = new Student("Богдан", "Котів", "ІПЗ-22");
$student5 = new Student("Степан", "Назар", "ІПЗ-23");
$student6 = new Student("Ростислав", "Василик", "ІПЗ-21");

echo "<h3>Існуючі об'єкти:</h3>";
echo "<h4>Студент 1:</h4>";
$student1->getInfo();
echo "<h4>Студент 2:</h4>";
$student2->getInfo();
echo "<h4>Студент 3:</h4>";
$student3->getInfo();
echo "<h4>Студент 4:</h4>";
$student4->getInfo();
echo "<h4>Студент 5:</h4>";
$student5->getInfo();
echo "<h4>Студент 6:</h4>";
$student6->getInfo();

$student7 = clone $student1;

echo "<h3>Скопійований об'єкт (Студент 7):</h3>";
$student7->getInfo();

echo "<h3>Оригінальний об'єкт (Студент 1) після копіювання:</h3>";
$student1->getInfo();
?>

</body>
</html>