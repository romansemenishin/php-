<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 1</title>
    <style>
        .error {
            color: red;
            border: 2px solid red;
        }
        .valid {
            background-image: url('https://cdn-icons-png.flaticon.com/512/5290/5290058.png');
            background-size: 20px;
            background-repeat: no-repeat;
            background-position: right center;
            padding-right: 25px;
        }
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
        .error-message {
            color: red;
            font-size: 0.8em;
            display: none;
        }
    </style>
</head>
<body>
<h2>Завдання 1</h2>
<p><a href="lab7.php">Повернутися до лабораторної роботи 7</a></p>

<form method="post" action="">
    <label for="name">Ім'я:</label>
    <input type="text" id="name" name="name" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
    <span class="error-message" id="name-error">Ім'я повинно містити лише літери: перша літера велика, наступні маленькі. Дозволено кирилиця і латина.</span>

    <label for="surname">Прізвище:</label>
    <input type="text" id="surname" name="surname" value="<?= isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : '' ?>">
    <span class="error-message" id="surname-error">Прізвище повинно містити лише літери: перша літера велика, наступні маленькі. Дозволено кирилиця і латина.</span>

    <label for="login">Логін:</label>
    <input type="text" id="login" name="login" value="<?= isset($_POST['login']) ? htmlspecialchars($_POST['login']) : '' ?>">
    <span class="error-message" id="login-error">Логін повинен містити тільки латинські малі літери.</span>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password">
    <span class="error-message" id="password-error">Пароль повинен містити мінімум 6 символів, з яких мінімум по 1 букві і цифрі.</span>

    <label for="repeat_password">Повторити пароль:</label>
    <input type="password" id="repeat_password" name="repeat_password">
    <span class="error-message" id="repeat-password-error">Паролі не співпадають.</span>

    <label for="email">Адреса електронної пошти (e-mail):</label>
    <input type="text" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
    <span class="error-message" id="email-error">Введіть коректну адресу електронної пошти.</span>

    <br><br>
    <input type="submit" value="Відправити">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    $repeat_password = $_POST['repeat_password'] ?? '';
    $email = $_POST['email'] ?? '';

    $errors = [];
    $valid_fields = [];

    if (preg_match('/^[А-ЯІЇЄҐA-Z][а-яіїєґa-z]+$/u', $name)) {
        $valid_fields[] = 'name';
    } else {
        $errors[] = 'name';
    }

    if (preg_match('/^[А-ЯІЇЄҐA-Z][а-яіїєґa-z]+$/u', $surname)) {
        $valid_fields[] = 'surname';
    } else {
        $errors[] = 'surname';
    }

    if (preg_match('/^[a-z]+$/', $login)) {
        $valid_fields[] = 'login';
    } else {
        $errors[] = 'login';
    }

    if (preg_match('/^(?=.*[A-Za-z])(?=.*\d).{6,}$/', $password)) {
        $valid_fields[] = 'password';
    } else {
        $errors[] = 'password';
    }

    if ($password === $repeat_password && !empty($password)) {
        $valid_fields[] = 'repeat_password';
    } else {
        $errors[] = 'repeat_password';
    }

    if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        $valid_fields[] = 'email';
    } else {
        $errors[] = 'email';
    }

    echo "<script>";
    foreach ($errors as $error) {
        echo "document.getElementById('{$error}').classList.add('error');";
        echo "document.getElementById('{$error}-error').style.display = 'block';";
    }
    foreach ($valid_fields as $valid) {
        echo "document.getElementById('{$valid}').classList.add('valid');";
    }
    echo "</script>";
}
?>
</body>
</html>