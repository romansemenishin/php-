<?php
require '../../config.php';

$message = "";

if(isset($_POST['add_news'])) {
    $tema = mysqli_real_escape_string($db_server, $_POST['tema']);
    $zagol = mysqli_real_escape_string($db_server, $_POST['zagol']);
    $content = mysqli_real_escape_string($db_server, $_POST['content']);
    $time = mysqli_real_escape_string($db_server, $_POST['time']);
    
    $result = mysqli_query($db_server, "INSERT INTO pivarchuk_news(tema, zagol, content, time) VALUES('$tema', '$zagol', '$content', '$time')");
    
    if($result) {
        $message = "<p>Новину успішно додано до таблиці pivarchuk_news.</p>";
    } else {
        $message = "<p>Помилка при додаванні новини: " . mysqli_error($db_server) . "</p>";
    }
}

$topics = [];
$topics_query = mysqli_query($db_server, "SELECT DISTINCT tema FROM pivarchuk_news ORDER BY tema");
while($topic = mysqli_fetch_assoc($topics_query)) {
    $topics[] = $topic['tema'];
}
?>

<html>
<head>
    <title>Завдання 6</title>
    <style>
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        textarea {
            height: 150px;
        }
        input[type="submit"] {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Завдання 6</h2>
    <p>Форма для додавання новини у таблицю pivarchuk_news.</p>
    
    <?php echo $message; ?>
    
    <form method="post">
        <div class="form-group">
            <label for="tema">Тематика:</label>
            <select name="tema" id="tema" required>
                <option value="">Виберіть тематику</option>
                <?php foreach($topics as $topic): ?>
                    <option value="<?php echo $topic; ?>"><?php echo $topic; ?></option>
                <?php endforeach; ?>
                <option value="Інше">Інше</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="zagol">Заголовок:</label>
            <input type="text" name="zagol" id="zagol" required>
        </div>
        
        <div class="form-group">
            <label for="content">Контент:</label>
            <textarea name="content" id="content" required></textarea>
        </div>
        
        <div class="form-group">
            <label for="time">Дата (формат: YYYY-MM-DD HH:MM:SS):</label>
            <input type="text" name="time" id="time" value="<?php echo date('Y-m-d H:i:s'); ?>" required>
        </div>
        
        <div class="form-group">
            <input type="submit" name="add_news" value="Додати новину">
        </div>
    </form>
    
    <p><a href="lab10.php">Повернутися до лабораторної роботи 10</a></p>
</body>
</html>