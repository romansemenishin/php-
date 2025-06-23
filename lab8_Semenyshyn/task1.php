<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 1</title>
</head>
<body>
<h2>Завдання 1</h2>
<p><a href="lab8.php">Повернутися до лабораторної роботи 8</a></p>

<?php
class Student {
    public $name;
    public $surname;
    public $group;
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

echo "<h3>Створені об'єкти класу Student:</h3>";
echo "<p>Студент 1: {$student1->name} {$student1->surname}, група {$student1->group}</p>";
echo "<p>Студент 2: {$student2->name} {$student2->surname}, група {$student2->group}</p>";
echo "<p>Студент 3: {$student3->name} {$student3->surname}, група {$student3->group}</p>";
?>

</body>
</html>