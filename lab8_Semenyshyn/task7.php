<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 7</title>
    <style>
        form {
            margin: 20px 0;
            width: 400px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="number"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        input[type="submit"] {
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
        .user-info {
            margin-top: 30px;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<h2>Завдання 7</h2>
<p><a href="lab8.php">Повернутися до лабораторної роботи 8</a></p>

<?php
class User {
    public $surname;
    public $name;
    public $age;
    public $email;
    
    public function setData($surname, $name, $age, $email) {
        $this->surname = $surname;
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
    }
    
    public function displayData() {
        echo "<div class='user-info'>";
        echo "<h3>Інформація про користувача:</h3>";
        echo "<p><strong>Прізвище:</strong> {$this->surname}</p>";
        echo "<p><strong>Ім'я:</strong> {$this->name}</p>";
        echo "<p><strong>Вік:</strong> {$this->age}</p>";
        echo "<p><strong>E-mail:</strong> {$this->email}</p>";
        echo "</div>";
    }
}

$error = "";
$userCreated = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = $_POST['surname'] ?? '';
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $email = $_POST['email'] ?? '';
    
    if (empty($surname) || empty($name) || empty($age) || empty($email)) {
        $error = "Всі поля повинні бути заповнені!";
    } else {
        $user = new User();
        $user->setData($surname, $name, $age, $email);
        $userCreated = true;
    }
}
?>

<form method="post" action="" onsubmit="return validateForm()">
    <label for="surname">Прізвище:</label>
    <input type="text" id="surname" name="surname" value="<?= isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : '' ?>">
    
    <label for="name">Ім'я:</label>
    <input type="text" id="name" name="name" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
    
    <label for="age">Вік:</label>
    <input type="number" id="age" name="age" value="<?= isset($_POST['age']) ? htmlspecialchars($_POST['age']) : '' ?>">
    
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
    
    <?php if (!empty($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
    
    <input type="submit" value="ГОТОВО">
</form>

<?php if ($userCreated): ?>
    <?php $user->displayData(); ?>
<?php endif; ?>

<script>
function validateForm() {
    var surname = document.getElementById('surname').value;
    var name = document.getElementById('name').value;
    var age = document.getElementById('age').value;
    var email = document.getElementById('email').value;
    
    if (surname === '' || name === '' || age === '' || email === '') {
        alert('Всі поля повинні бути заповнені!');
        return false;
    }
    
    return true;
}
</script>

</body>
</html>