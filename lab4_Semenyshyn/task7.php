<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 7 - Лабораторна робота 4</title>
    <style>
        form {
            width: 600px;
            margin: 0 auto;
        }
        fieldset {
            margin-bottom: 20px;
            padding: 15px;
        }
        legend {
            font-weight: bold;
        }
        label {
            display: block;
            margin: 5px 0;
        }
        select {
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
        .results {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<h2>Завдання 7</h2>

<form action="task7.php" method="post">
    <fieldset>
        <legend>Питання 1: Яку операційну систему ви використовуєте найчастіше?</legend>
        <label>
            <input type="radio" name="os" value="Windows" <?php echo (isset($_POST['os']) && $_POST['os'] == 'Windows') ? 'checked' : ''; ?>>
            Windows
        </label>
        <label>
            <input type="radio" name="os" value="MacOS" <?php echo (isset($_POST['os']) && $_POST['os'] == 'MacOS') ? 'checked' : ''; ?>>
            MacOS
        </label>
        <label>
            <input type="radio" name="os" value="Linux" <?php echo (isset($_POST['os']) && $_POST['os'] == 'Linux') ? 'checked' : ''; ?>>
            Linux
        </label>
        <label>
            <input type="radio" name="os" value="Інша" <?php echo (isset($_POST['os']) && $_POST['os'] == 'Інша') ? 'checked' : ''; ?>>
            Інша
        </label>
    </fieldset>

    <fieldset>
        <legend>Питання 2: Які мови програмування ви знаєте? (можна вибрати кілька)</legend>
        <label>
            <input type="checkbox" name="languages[]" value="PHP" <?php echo (isset($_POST['languages']) && in_array('PHP', $_POST['languages'])) ? 'checked' : ''; ?>>
            PHP
        </label>
        <label>
            <input type="checkbox" name="languages[]" value="JavaScript" <?php echo (isset($_POST['languages']) && in_array('JavaScript', $_POST['languages'])) ? 'checked' : ''; ?>>
            JavaScript
        </label>
        <label>
            <input type="checkbox" name="languages[]" value="Python" <?php echo (isset($_POST['languages']) && in_array('Python', $_POST['languages'])) ? 'checked' : ''; ?>>
            Python
        </label>
        <label>
            <input type="checkbox" name="languages[]" value="Java" <?php echo (isset($_POST['languages']) && in_array('Java', $_POST['languages'])) ? 'checked' : ''; ?>>
            Java
        </label>
        <label>
            <input type="checkbox" name="languages[]" value="C++" <?php echo (isset($_POST['languages']) && in_array('C++', $_POST['languages'])) ? 'checked' : ''; ?>>
            C++
        </label>
    </fieldset>

    <fieldset>
        <legend>Питання 3: Скільки років ви займаєтесь програмуванням?</legend>
        <select name="experience">
            <option value="">-- Виберіть варіант --</option>
            <option value="Менше року" <?php echo (isset($_POST['experience']) && $_POST['experience'] == 'Менше року') ? 'selected' : ''; ?>>Менше року</option>
            <option value="1-3 роки" <?php echo (isset($_POST['experience']) && $_POST['experience'] == '1-3 роки') ? 'selected' : ''; ?>>1-3 роки</option>
            <option value="3-5 років" <?php echo (isset($_POST['experience']) && $_POST['experience'] == '3-5 років') ? 'selected' : ''; ?>>3-5 років</option>
            <option value="5-10 років" <?php echo (isset($_POST['experience']) && $_POST['experience'] == '5-10 років') ? 'selected' : ''; ?>>5-10 років</option>
            <option value="Більше 10 років" <?php echo (isset($_POST['experience']) && $_POST['experience'] == 'Більше 10 років') ? 'selected' : ''; ?>>Більше 10 років</option>
        </select>
    </fieldset>

    <fieldset>
        <legend>Питання 4: Які IDE або редактори коду ви використовуєте? (можна вибрати кілька)</legend>
        <select name="editors[]" multiple size="5">
            <option value="Visual Studio Code" <?php echo (isset($_POST['editors']) && in_array('Visual Studio Code', $_POST['editors'])) ? 'selected' : ''; ?>>Visual Studio Code</option>
            <option value="PhpStorm" <?php echo (isset($_POST['editors']) && in_array('PhpStorm', $_POST['editors'])) ? 'selected' : ''; ?>>PhpStorm</option>
            <option value="Sublime Text" <?php echo (isset($_POST['editors']) && in_array('Sublime Text', $_POST['editors'])) ? 'selected' : ''; ?>>Sublime Text</option>
            <option value="Atom" <?php echo (isset($_POST['editors']) && in_array('Atom', $_POST['editors'])) ? 'selected' : ''; ?>>Atom</option>
            <option value="Notepad++" <?php echo (isset($_POST['editors']) && in_array('Notepad++', $_POST['editors'])) ? 'selected' : ''; ?>>Notepad++</option>
            <option value="Vim" <?php echo (isset($_POST['editors']) && in_array('Vim', $_POST['editors'])) ? 'selected' : ''; ?>>Vim</option>
            <option value="Інший" <?php echo (isset($_POST['editors']) && in_array('Інший', $_POST['editors'])) ? 'selected' : ''; ?>>Інший</option>
        </select>
        <small>(Утримуйте Ctrl для вибору кількох варіантів)</small>
    </fieldset>

    <input type="submit" value="Відправити">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    if (!isset($_POST["os"]) || empty($_POST["os"])) {
        $errors[] = "Ви не відповіли на питання 1 (Операційна система)";
    }

    if (!isset($_POST["languages"]) || empty($_POST["languages"])) {
        $errors[] = "Ви не відповіли на питання 2 (Мови програмування)";
    }

    if (!isset($_POST["experience"]) || empty($_POST["experience"])) {
        $errors[] = "Ви не відповіли на питання 3 (Досвід програмування)";
    }

    if (!isset($_POST["editors"]) || empty($_POST["editors"])) {
        $errors[] = "Ви не відповіли на питання 4 (Редактори коду)";
    }

    if (!empty($errors)) {
        echo "<div class='error'>";
        echo "<strong>Будь ласка, дайте відповідь на всі запитання:</strong><br>";
        foreach ($errors as $error) {
            echo "- $error<br>";
        }
        echo "</div>";
    } else {
        echo "<div class='results'>";
        echo "<h3>Ваші відповіді:</h3>";

        echo "<p><strong>Питання 1: Яку операційну систему ви використовуєте найчастіше?</strong><br>";
        echo "Відповідь: " . htmlspecialchars($_POST["os"]) . "</p>";

        echo "<p><strong>Питання 2: Які мови програмування ви знаєте?</strong><br>";
        echo "Відповідь: " . implode(", ", array_map('htmlspecialchars', $_POST["languages"])) . "</p>";

        echo "<p><strong>Питання 3: Скільки років ви займаєтесь програмуванням?</strong><br>";
        echo "Відповідь: " . htmlspecialchars($_POST["experience"]) . "</p>";

        echo "<p><strong>Питання 4: Які IDE або редактори коду ви використовуєте?</strong><br>";
        echo "Відповідь: " . implode(", ", array_map('htmlspecialchars', $_POST["editors"])) . "</p>";

        echo "</div>";
    }
}
?>

<h3 class='back'><a style="text-decoration: none" href='lab4.php'>Назад до лабораторної роботи 4</a></h3>
</body>
</html>
