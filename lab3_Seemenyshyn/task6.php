<?php
require_once '../../config.php';
include_once("function.php");
?>
    <form action="task6.php" method="get">
        <label for="formvariable">Введіть натуральне число:</label>
        <input type="text" name="formvariable" id="formvariable">
        <input type="submit" value="Додати">
    </form>

    <?php
    if (isset($_GET['formvariable']) && ctype_digit($_GET['formvariable']) && $_GET['formvariable'] > 0) {
        $variable = (int)$_GET['formvariable'];
        echo_fun($variable);
    } elseif (isset($_GET['formvariable'])) {
        echo "<p style='color: red;'>Будь ласка, введіть натуральне число більше 0.</p>";
    }
    ?>
    <br>
<?php
include_once("task7.php");
?>
