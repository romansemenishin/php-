<?php 
    require '../../config.php';
?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function is_integer_value($num) {
            return filter_var($num, FILTER_VALIDATE_INT) !== false;
        }
    
        $x = $_POST["x"];
        $y = $_POST["y"];
    
        if (is_integer_value($x) && is_integer_value($y)) {
            $x = intval($x);
            $y = intval($y);
            
            if ($x*$y>0) {
                $F = (3*$x*$y-$x);
                $formula = "F = 3xy-x";
            } elseif ((7*$x)>(2*$y)||($y>2)) {
                $F = (2*$x - ((3*$y)/($x)));
                $formula = "F = 2x-3y/x";
            } else {
                $F = $x-$y;
                $formula = "F = x-y";
            }
            
            echo "Введені числа: x = $x, y = $y<br>";
            echo "Обрана формула: $formula<br>";
            echo "F = $F";
        } else {
            echo "Введіть цілі числа";
        }
    }
    
    
?>
    <h3 class='back'><a style="text-decoration: none"href='lab2.php'>Назад</a></h3>
