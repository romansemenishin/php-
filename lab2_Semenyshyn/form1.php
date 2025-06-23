
<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $num1 = intval($_POST["num1"]);
    $num2 = intval($_POST["num2"]);

    echo "$num1 - $num2 = ". ($num1 - $num2) ."<br>";
    echo "$num1 * $num2 = ". ($num1 * $num2) ."<br>";
    echo "$num1 % $num2 = ". ($num2 != null ? $num1 % $num2 : "Ділення на нуль неможливе") ."<br>";

}
?>