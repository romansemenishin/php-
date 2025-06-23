<?php
    require '../../config.php';

    mysqli_query($db_server, "CREATE TABLE IF NOT EXISTS user(id INTEGER PRIMARY KEY AUTO_INCREMENT, 
        age INTEGER, login VARCHAR(250) UNIQUE, password VARCHAR(100))");

    if(isset($_POST["age"], $_POST["login"], $_POST["password"])){
        $age = $_POST["age"];
        $login = $_POST["login"];
        $password = $_POST["password"];

        try {
            $result = mysqli_query($db_server, "INSERT INTO user(age, login, password) VALUES ('$age', '$login', '$password')");
            if($result){
                echo "<p>Користувача успішно додано!</p>";
            }
        } catch (\Throwable $e) {
            echo "Помилка: " . $e->getMessage();
        }
    }
?>

<html>
    <head> <title>Завдання 4</title></head>
    <style>
        form{
            width: 250px;
            margin : 0 auto;
            display: flex;
            flex-direction: column;
        }

        table{margin: 1em;}
    </style>
    <body>
        <h2>Завдання 4</h2>
        <form action="" method="POST">
            <input type="number" name="age" placeholder="Ваш вік:" required>
            <input type="text" name="login" placeholder="Ваш логін:" required>
            <input type="password" name="password" placeholder="Ваш пароль:" required>
            <input type="submit" value="Зареєструватися!">
        </form>

        <table border="2">
            <tr><th>ID</th><th>Логін</th><th>Вік</th><th>Пароль</th></tr>

            <?php
                $query_res = mysqli_query($db_server, "select * from user order by id");
    
                if (mysqli_num_rows($query_res) > 0) {
                    while($row = mysqli_fetch_assoc($query_res)) {
                        echo "<tr><td>".$row["id"]."</td><td>".$row["login"]."</td><td>".$row["age"]."</td><td>".$row["password"]."</td></tr>";
                    }
                } else {
                    echo "0 результатів";
                }                
                mysqli_close($db_server);   
            ?>
        </table>
        <h3 class='back'><a href='lab9.php'>Назад до лабораторної роботи</a></h3>
    </body>
</html>