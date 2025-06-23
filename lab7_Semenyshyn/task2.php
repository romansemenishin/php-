<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 2</title>
    <style>
        form {
            margin: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            padding: 5px;
            margin-bottom: 5px;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .valid {
            color: green;
        }
        .invalid {
            color: red;
        }
    </style>
</head>
<body>
<h2>Завдання 2</h2>
<p><a href="lab7.php">Повернутися до лабораторної роботи 7</a></p>

<div>
    <h3>Країна: Польща</h3>
    <p>Алгоритм формування індексу: Дві цифри, дефіс, три цифри</p>
    <p>Зразок коректного введення: 12-345</p>
</div>

<form method="post" action="">
    <label for="postal_code">Введіть поштовий індекс Польщі:</label>
    <input type="text" id="postal_code" name="postal_code" value="<?= isset($_POST['postal_code']) ? htmlspecialchars($_POST['postal_code']) : '' ?>">
    <br>
    <input type="submit" value="Перевірити">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postal_code = $_POST['postal_code'] ?? '';
    
    if (preg_match('/^\d{2}-\d{3}$/', $postal_code)) {
        echo '<div class="result valid">Поштовий індекс введено коректно!</div>';
    } else {
        echo '<div class="result invalid">Поштовий індекс введено некоректно! Будь ласка, введіть індекс у форматі: дві цифри, дефіс, три цифри (наприклад, 12-345).</div>';
    }
}
?>
</body>
</html>