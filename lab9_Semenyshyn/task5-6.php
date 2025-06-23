<?php
    require '../../config.php';

    mysqli_query($db_server, "CREATE TABLE IF NOT EXISTS sklad(
        id INTEGER PRIMARY KEY AUTO_INCREMENT, 
        name VARCHAR(250), 
        image VARCHAR(250), 
        price DECIMAL(10,2), 
        quantity INTEGER)");

    $check_query = mysqli_query($db_server, "SELECT * FROM sklad");
    if (mysqli_num_rows($check_query) == 0) {
        mysqli_query($db_server, "INSERT INTO sklad (name, image, price, quantity) VALUES 
            ('Сукня літня', 'dress_summer.jpg', 1200.00, 10),
            ('Блуза шовкова', 'blouse_silk.jpg', 850.50, 15),
            ('Спідниця джинсова', 'skirt_jeans.jpg', 750.00, 8),
            ('Пальто зимове', 'coat_winter.jpg', 2500.00, 5)");
    }
?>

<html>
    <head> <title>Завдання 5-6</title></head>
    <style>
        .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 20px;
        }
        .item {
            border: 1px solid #ccc;
            padding: 15px;
            text-align: center;
        }
        .item img {
            max-width: 200px;
            height: auto;
        }
        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }
    </style>
    <body>
        <h2>Завдання 6</h2>
        <div class="container">
            <?php
                $query_res = mysqli_query($db_server, "SELECT * FROM sklad");
    
                if (mysqli_num_rows($query_res) > 0) {
                    while($row = mysqli_fetch_assoc($query_res)) {
                        echo "<div class='item'>";
                        echo "<h3><a href='?id=" . $row["id"] . "'>" . $row["name"] . "</a></h3>";
                        echo "<a href='?id=" . $row["id"] . "'><img src='images/" . $row["image"] . "' alt='" . $row["name"] . "'></a>";
                        echo "<p>Ціна: " . $row["price"] . " грн</p>";
                        echo "<p>Наявна кількість: " . $row["quantity"] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "Товари відсутні";
                }
                
                if(isset($_GET["id"])) {
                    $id = $_GET["id"];
                    $item_query = mysqli_query($db_server, "SELECT * FROM sklad WHERE id = $id");
                    $item = mysqli_fetch_assoc($item_query);
                    
                    if($item) {
                        echo "<div style='position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); display: flex; justify-content: center; align-items: center;'>";
                        echo "<div style='background: white; padding: 20px; max-width: 600px;'>";
                        echo "<h2>" . $item["name"] . "</h2>";
                        echo "<img src='images/" . $item["image"] . "' alt='" . $item["name"] . "' style='max-width: 300px;'>";
                        echo "<p>Ціна: " . $item["price"] . " грн</p>";
                        echo "<p>Наявна кількість: " . $item["quantity"] . "</p>";
                        
                        echo "<form method='POST' action='?id=$id'>";
                        echo "<label>Кількість: <input type='number' name='quantity' min='1' value='1'></label>";
                        echo "<div class='button-group'>";
                        echo "<button type='submit' name='buy'>Купити</button>";
                        echo "<button type='submit' name='restock'>Поповнити склад</button>";
                        echo "</div>";
                        echo "</form>";
                        
                        echo "<p><a href='task5-6.php'>Закрити</a></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                
                if(isset($_POST["buy"], $_POST["quantity"], $_GET["id"])) {
                    $id = $_GET["id"];
                    $quantity = $_POST["quantity"];
                    
                    $item_query = mysqli_query($db_server, "SELECT * FROM sklad WHERE id = $id");
                    $item = mysqli_fetch_assoc($item_query);
                    
                    if($item && $quantity <= $item["quantity"]) {
                        $new_quantity = $item["quantity"] - $quantity;
                        mysqli_query($db_server, "UPDATE sklad SET quantity = $new_quantity WHERE id = $id");
                        echo "<script>alert('Товар успішно придбано!'); window.location = 'task5-6.php';</script>";
                    } else {
                        echo "<script>alert('Помилка: недостатня кількість товару!'); window.location = 'task5-6.php';</script>";
                    }
                }
                
                if(isset($_POST["restock"], $_POST["quantity"], $_GET["id"])) {
                    $id = $_GET["id"];
                    $quantity = $_POST["quantity"];
                    
                    $item_query = mysqli_query($db_server, "SELECT * FROM sklad WHERE id = $id");
                    $item = mysqli_fetch_assoc($item_query);
                    
                    if($item) {
                        $new_quantity = $item["quantity"] + $quantity;
                        mysqli_query($db_server, "UPDATE sklad SET quantity = $new_quantity WHERE id = $id");
                        echo "<script>alert('Склад успішно поповнено!'); window.location = 'task5-6.php';</script>";
                    }
                }
                
                mysqli_close($db_server);   
            ?>
        </div>
        <h3 class='back'><a href='lab9.php'>Назад до лабораторної роботи</a></h3>
    </body>
</html>