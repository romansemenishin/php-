<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $items = ["bed", "stil", "sofa", "shafa", "chair", "door"];
$labels = [
    "bed" => "Ліжко",
    "stil" => "Стіл",
    "sofa" => "Диван",
    "shafa" => "Шафа",
    "chair" => "Крісло",
    "door" => "Двері"
];

    $choice = $_POST["choice"];
    $correct = $_POST["correct"];

    if ($choice === $correct) {
        echo "<h2>Правильно! Ви обрали: {$labels[$choice]}</h2>";
    } else {
        echo "<h2>Неправильно! Ви обрали: {$labels[$choice]}. Правильна відповідь: {$labels[$correct]}</h2>";
    }

    echo '<h3>Правильне зображення: </h3>';
    echo '<img src="images/' . strtolower($correct) . '.jpg" alt="' . $correct . '" width="150">';

    echo '<br><a style="text-decoration: none" href="task4.php">Спробувати ще раз</a>';
}
?>
