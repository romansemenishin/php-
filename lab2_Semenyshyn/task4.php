<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вибір зображення</title>
</head>
<body>
<?php
    require_once '../../config.php';
?>
<?php
$items = ["bed", "stil", "sofa", "shafa", "chair", "door"];
$labels = [
    "bed" => "Ліжко",
    "stil" => "Стіл",
    "sofa" => "Диван",
    "shafa" => "Шафа",
    "chair" => "Крісло",
    "door" => "Двері"
];

$random_keys = array_rand($items, 4);
$random_items = array_map(fn($key) => $items[$key], $random_keys);

$correct_key = $random_keys[array_rand($random_keys)];
$correct = $items[$correct_key];
$random_label = $labels[$correct];
?>

<h2>Виберіть, будь ласка, зображення <strong><?= $random_label ?></strong></h2>

<form action="checker.php" method="POST">
    <?php foreach ($random_items as $item): 
        $img_path = "images/" . strtolower($item) . ".jpg"; 
    ?>
        <button type="submit" name="choice" value="<?= $item; ?>">
            <?php if (file_exists($img_path)): ?>
                <img src="<?= $img_path; ?>" alt="<?= $item; ?>" width="150">
            <?php else: ?>
                <p>Зображення недоступне</p>
            <?php endif; ?>
        </button>
    <?php endforeach; ?>
    <input type="hidden" name="correct" value="<?= $correct; ?>">
</form>



<h3 class='back'><a style="text-decoration: none" href='lab2.php'>Назад</a></h3>
<h3 class='back'><a style="text-decoration: none" href='<?= $config['base_url'] ?>'>На головну сторінку дисципліни</a></h3>

</body>
</html>
