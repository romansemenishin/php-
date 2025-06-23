<?php
require '../../config.php';
session_start();

if (!isset($db_server) || !$db_server) {
    die("Помилка: Не вдалося встановити з'єднання з базою даних.");
}

if (isset($_POST['register'])) {
    $login = mysqli_real_escape_string($db_server, $_POST['login']);
    $passwd = mysqli_real_escape_string($db_server, $_POST['passwd']);
    $full_name = mysqli_real_escape_string($db_server, $_POST['full_name']);
    $email = mysqli_real_escape_string($db_server, $_POST['email']);

    $check_query = "SELECT * FROM user_for_session WHERE login = '$login'";
    $result = mysqli_query($db_server, $check_query);

    if (mysqli_num_rows($result) > 0) {
        $error = "Користувач з логіном '$login' вже існує. Виберіть інший логін.";
    } else {
        $insert_query = "INSERT INTO user_for_session (login, passwd, full_name, email) 
                         VALUES ('$login', '$passwd', '$full_name', '$email')";

        if (mysqli_query($db_server, $insert_query)) {
            $success = "Користувач успішно зареєстрований!";
        } else {
            $error = "Помилка при реєстрації: " . mysqli_error($db_server);
        }
    }
}
?>
<html>
<head>
    <title>Реєстрація користувача</title>
    <style>
        table {
            border-collapse: collapse;
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
<h2>Реєстрація користувача</h2>
<p><a href="lab11.php">Повернутися до лабораторної роботи 11</a></p>
<p><a href="task5-6.php">Повернутися до завдання 5-6</a></p>

<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>

<?php if (isset($success)): ?>
    <p style="color: green;"><?php echo $success; ?></p>
<?php endif; ?>

<form method="post">
    <table>
        <tr>
            <td>Логін:</td>
            <td><input type="text" name="login" required></td>
        </tr>
        <tr>
            <td>Пароль:</td>
            <td><input type="password" name="passwd" required></td>
        </tr>
        <tr>
            <td>Повне ім'я:</td>
            <td><input type="text" name="full_name"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="register" value="Зареєструватися"></td>
        </tr>
    </table>
</form>

<h3>Зареєстровані користувачі</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Логін</th>
        <th>Пароль</th>
        <th>Повне ім'я</th>
        <th>Email</th>
        <th>Дата реєстрації</th>
    </tr>
    <?php
    $select_query = "SELECT * FROM user_for_session";
    $result = mysqli_query($db_server, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['login'] . "</td>";
            echo "<td>" . $row['passwd'] . "</td>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['registration_date'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Немає зареєстрованих користувачів</td></tr>";
    }
    ?>
</table>

<?php
if (isset($_SESSION['login'])) {
    echo "<p>Ви увійшли як користувач " . $_SESSION['login'] . "</p>";
} else {
    echo "<p>Ви увійшли як гість</p>";
}
?>

</body>
</html>
