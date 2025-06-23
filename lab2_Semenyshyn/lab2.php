<?php 
   require '../../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="form1.php" method="post">
    <label for="num1">Число 1:</label>
        <input type="number" name="num1" id="num1" required>
        <br>
        <label for="num2">Число 2:</label>
        <input type="number" name="num2" id="num2" required>
        <br>
        <button type="submit">Submit</button>
    </form>
    <br>
    <form action="form2.php" method="post">
    <label for="x">Число для x:</label>
        <input type="number" name="x" id="x" required>
        <br>
        <label for="y">Число для y:</label>
        <input type="number" name="y" id="y" required>
        <br>
        <label for="z">Число для z:</label>
        <input type="number" name="z" id="z" required>
        <br>
        <button type="submit">Submit</button>
    </form>
    <br>
    <form action="form3.php" method="post">
    <label for="x">Число для x:</label>
            <input type="number" name="x" id="x" required>
            <br>
            <label for="y">Число для y:</label>
            <input type="number" name="y" id="y" required>
            <br>
            <button type="submit">Submit</button>
    </form>





<h3><a style="text-decoration: none" href= 'task4.php'>Завдання 4</a></h3>
<h3 class='back'><a style="text-decoration: none"href='<?= $config['base_url'] ?>'>Назад</a></h3>
</body>
</html>