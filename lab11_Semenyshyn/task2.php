<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 2</title>
</head>
<body>
<h2>Завдання 2</h2>
<p><a href="lab11.php">Повернутися до лабораторної роботи 11</a></p>

<h3>Приклад 1: Створення сесії</h3>
<?php
session_start();
echo "Ідентифікатор сесії: " . session_id() . "<br>";
echo "Ім'я сесії: " . session_name() . "<br>";
?>

<h3>Приклад 2: Реєстрація змінних сесії</h3>
<?php
if (!isset($_GET['go'])) {
    echo "<form>
    Логін: <input type=text name=login>
    Пароль: <input type=password name=passwd>
    <input type=submit name=go value='Увійти'>
    </form>";
} else {
    $_SESSION['login'] = $_GET['login'];
    $_SESSION['passwd'] = $_GET['passwd'];
    
    echo "Змінні сесії: <br>";
    print_r($_SESSION);
    echo "<br>";
    
    if ($_GET['login'] == "pit" && $_GET['passwd'] == "123") {
        echo "Авторизація успішна!<br>";
    } else {
        echo "Неправильний ввід, спробуйте ще раз<br>";
    }
}
?>

<h3>Приклад 3: Видалення змінних сесії</h3>
<form method="post">
    <input type="submit" name="unset_login" value="Видалити логін">
    <input type="submit" name="unset_passwd" value="Видалити пароль">
    <input type="submit" name="unset_all" value="Видалити всі змінні сесії">
    <input type="submit" name="destroy_session" value="Знищити сесію">
</form>

<?php
if (isset($_POST['unset_login'])) {
    unset($_SESSION['login']);
    echo "Логін видалено<br>";
}

if (isset($_POST['unset_passwd'])) {
    unset($_SESSION['passwd']);
    echo "Пароль видалено<br>";
}

if (isset($_POST['unset_all'])) {
    session_unset();
    echo "Всі змінні сесії видалено<br>";
}

if (isset($_POST['destroy_session'])) {
    session_destroy();
    echo "Сесію знищено<br>";
}

echo "Поточні змінні сесії: <br>";
print_r($_SESSION);
echo "<br>";
?>

<h3>Приклад 4: Робота з cookies</h3>
<form method="post">
    <input type="text" name="cookie_name" placeholder="Назва cookie">
    <input type="text" name="cookie_value" placeholder="Значення cookie">
    <input type="submit" name="set_cookie" value="Встановити cookie">
    <input type="submit" name="delete_cookie" value="Видалити cookie">
</form>

<?php
if (isset($_POST['set_cookie']) && !empty($_POST['cookie_name']) && !empty($_POST['cookie_value'])) {
    $cookie_name = $_POST['cookie_name'];
    $cookie_value = $_POST['cookie_value'];
    setcookie($cookie_name, $cookie_value, time() + 3600);
    echo "Cookie '{$cookie_name}' встановлено зі значенням '{$cookie_value}'<br>";
}

if (isset($_POST['delete_cookie']) && !empty($_POST['cookie_name'])) {
    $cookie_name = $_POST['cookie_name'];
    setcookie($cookie_name, "", time() - 3600);
    echo "Cookie '{$cookie_name}' видалено<br>";
}

echo "Поточні cookies: <br>";
print_r($_COOKIE);
echo "<br>";
?>

<h3>Приклад 5: Встановлення масиву cookies і його читання</h3>
<form method="post">
    <input type="submit" name="set_array_cookies" value="Встановити масив cookies">
</form>

<?php
if (isset($_POST['set_array_cookies'])) {
    setcookie("cookie[1]", "Перший", time() + 3600);
    setcookie("cookie[2]", "Другий", time() + 3600);
    setcookie("cookie[3]", "Третій", time() + 3600);
    echo "Масив cookies встановлено<br>";
}

if (isset($_COOKIE['cookie'])) {
    echo "Масив cookies:<br>";
    foreach ($_COOKIE['cookie'] as $name => $value) {
        echo "$name: $value <br>";
    }
}
?>

</body>
</html>