<?php
require '../../config.php';

$selected_news = null;
$selected_topic = null;

if(isset($_GET['news_id'])) {
    $news_id = intval($_GET['news_id']);
    $query = mysqli_query($db_server, "SELECT * FROM pivarchuk_news WHERE id = $news_id");
    if(mysqli_num_rows($query) > 0) {
        $selected_news = mysqli_fetch_assoc($query);
    }
} elseif(isset($_GET['topic'])) {
    $selected_topic = mysqli_real_escape_string($db_server, $_GET['topic']);
}

$total_news = mysqli_num_rows(mysqli_query($db_server, "SELECT * FROM pivarchuk_news"));
$out_file = fopen("files/out.txt", "w") or die("Не вдалося відкрити файл!");
fwrite($out_file, "Загальна кількість новин: $total_news");
fclose($out_file);
?>

<html>
<head>
    <title>Завдання 4</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .main-news {
            margin-bottom: 30px;
        }
        .main-news h3 {
            color: #d91e18;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 10px;
        }
        .topic {
            margin-bottom: 20px;
        }
        .topic-header {
            background-color: #f0f0f0;
            padding: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            font-weight: bold;
            color: #333;
        }
        .news-item {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e0e0e0;
        }
        .news-title {
            color: #0078d7;
            text-decoration: none;
            font-weight: bold;
        }
        .news-title:hover {
            text-decoration: underline;
        }
        .news-date {
            color: #666;
            font-size: 0.8em;
        }
        .news-content {
            margin-top: 20px;
            line-height: 1.6;
        }
        .back-link {
            margin-top: 20px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h2>Завдання 4</h2>
    
    <?php if($selected_news): ?>
        <div class="news-detail">
            <h3><?php echo $selected_news['zagol']; ?></h3>
            <div class="news-date"><?php echo $selected_news['time']; ?></div>
            <div class="news-content"><?php echo $selected_news['content']; ?></div>
            <a href="task4.php" class="back-link">Повернутися до списку новин</a>
        </div>
    <?php elseif($selected_topic): ?>
        <h3>Новини за темою: <?php echo $selected_topic; ?></h3>
        <?php
        $topic_news = mysqli_query($db_server, "SELECT * FROM pivarchuk_news WHERE tema = '$selected_topic' ORDER BY time DESC");
        if(mysqli_num_rows($topic_news) > 0) {
            while($news = mysqli_fetch_assoc($topic_news)) {
                echo '<div class="news-item">';
                echo '<a href="task4.php?news_id=' . $news['id'] . '" class="news-title">' . $news['zagol'] . '</a>';
                echo '<div class="news-date">' . $news['time'] . '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>Немає новин за цією темою.</p>';
        }
        ?>
        <a href="task4.php" class="back-link">Повернутися до списку новин</a>
    <?php else: ?>
        <div class="main-news">
            <h3>Головне</h3>
            <?php
            $main_news = mysqli_query($db_server, "SELECT * FROM pivarchuk_news ORDER BY time DESC LIMIT 3");
            if(mysqli_num_rows($main_news) > 0) {
                while($news = mysqli_fetch_assoc($main_news)) {
                    echo '<div class="news-item">';
                    echo '<a href="task4.php?news_id=' . $news['id'] . '" class="news-title">' . $news['zagol'] . '</a>';
                    echo '<div class="news-date">' . $news['time'] . '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
        
        <?php
        $topics = mysqli_query($db_server, "SELECT DISTINCT tema FROM pivarchuk_news ORDER BY tema");
        while($topic = mysqli_fetch_assoc($topics)) {
            $topic_name = $topic['tema'];
            echo '<div class="topic">';
            echo '<div class="topic-header" onclick="window.location=\'task4.php?topic=' . $topic_name . '\'">' . $topic_name . '</div>';
            
            $topic_news = mysqli_query($db_server, "SELECT * FROM pivarchuk_news WHERE tema = '$topic_name' ORDER BY time DESC LIMIT 3");
            if(mysqli_num_rows($topic_news) > 0) {
                while($news = mysqli_fetch_assoc($topic_news)) {
                    echo '<div class="news-item">';
                    echo '<a href="task4.php?news_id=' . $news['id'] . '" class="news-title">' . $news['zagol'] . '</a>';
                    echo '<div class="news-date">' . $news['time'] . '</div>';
                    echo '</div>';
                }
            }
            
            echo '</div>';
        }
        ?>
    <?php endif; ?>
    
    <p><a href="lab10.php">Повернутися до лабораторної роботи 10</a></p>
</body>
</html>