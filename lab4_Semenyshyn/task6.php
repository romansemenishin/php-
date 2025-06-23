<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 6 - Лабораторна робота 4</title>
    <style>
        form {
            width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        input[type="submit"] {
            margin-top: 15px;
            padding: 10px 15px;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
        table {
            border-collapse: collapse;
            margin-top: 20px;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>Завдання 6</h2>

<form action="task6.php" method="post">
    <label for="surname">Прізвище:</label>
    <input type="text" id="surname" name="surname" value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>">

    <label for="name">Ім'я:</label>
    <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password">

    <label for="confirm_password">Повторити пароль:</label>
    <input type="password" id="confirm_password" name="confirm_password">

    <input type="submit" value="Готово">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    if (empty($_POST["surname"])) {
        $errors[] = "Поле 'Прізвище' не заповнено";
    }

    if (empty($_POST["name"])) {
        $errors[] = "Поле 'Ім'я' не заповнено";
    }

    if (empty($_POST["email"])) {
        $errors[] = "Поле 'E-mail' не заповнено";
    }

    if (empty($_POST["password"])) {
        $errors[] = "Поле 'Пароль' не заповнено";
    }

    if (empty($_POST["confirm_password"])) {
        $errors[] = "Поле 'Повторити пароль' не заповнено";
    }

    if ($_POST["password"] !== $_POST["confirm_password"]) {
        $errors[] = "Паролі не співпадають";
    }

    if (!empty($errors)) {
        echo "<div class='error'>";
        echo "<strong>Помилки:</strong><br>";
        foreach ($errors as $error) {
            echo "- $error<br>";
        }
        echo "</div>";
    } else {
        $userData = array(
            "Прізвище" => $_POST["surname"],
            "Ім'я" => $_POST["name"],
            "E-mail" => $_POST["email"],
            "Пароль" => str_repeat("*", strlen($_POST["password"]))
        );

        echo "<h3>Введені дані:</h3>";
        echo "<table>";
        echo "<tr><th>Поле</th><th>Значення</th></tr>";

        foreach ($userData as $field => $value) {
            echo "<tr>";
            echo "<td>$field</td>";
            echo "<td>$value</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
}
?>

<h3 class='back'><a style="text-decoration: none" href='lab4.php'>Назад до лабораторної роботи 4</a></h3>
</body>
</html>
