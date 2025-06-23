<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 2</title>
</head>
<body>
<h2>Завдання 2</h2>
<p><a href="lab8.php">Повернутися до лабораторної роботи 8</a></p>

<?php
class Student {
    public $name;
    public $surname;
    public $group;
    
    public function getInfo() {
        echo "<p>Ім'я: {$this->name}, Прізвище: {$this->surname}, Група: {$this->group}</p>";
    }
}

$student1 = new Student();
$student1->name = "Павло";
$student1->surname = "Молитовник";
$student1->group = "ІПЗ-23";

$student2 = new Student();
$student2->name = "Денис";
$student2->surname = "Морис";
$student2->group = "ІПЗ-23";

$student3 = new Student();
$student3->name = "Софія";
$student3->surname = "Василюк";
$student3->group = "ІПЗ-21";

echo "<h3>Виклик методу getInfo() для кожного об'єкта:</h3>";
echo "<h4>Студент 1:</h4>";
$student1->getInfo();
echo "<h4>Студент 2:</h4>";
$student2->getInfo();
echo "<h4>Студент 3:</h4>";
$student3->getInfo();
?>

</body>
</html>