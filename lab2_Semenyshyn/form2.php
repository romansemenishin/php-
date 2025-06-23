<?php
    require '../../config.php';
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function is_natural($num) {
            return ctype_digit($num) && $num > 0;
        }
    
        $x = $_POST["x"];
        $y = $_POST["y"];
        $z = $_POST["z"];
    
        if (is_natural($x) && is_natural($y) && is_natural($z)) {
            $x = intval($x);
            $y = intval($y);
            $z = intval($z);
            
            $F = ($x+pow($y, 2)+pow($z, 0.5));
            
            echo "Введені числа: x = $x, y = $y, z = $z<br>";
            echo "F = x+y^2+z^0.5 = $F";
        } else {
            echo "Введіть натуральні числа";
        }
    }
    
?>
<h3 class='back'><a style="text-decoration: none; font-weight: 500; color: #38c695"href='lab2.php'>Назад</a></h3>
