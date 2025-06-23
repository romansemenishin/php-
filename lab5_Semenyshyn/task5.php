<?php
require '../../config.php';
?>
<html>
<head>
    <title>Завдання 5</title>
</head>
<body>
<h2>Завдання 5</h2>
<p><a href="lab5.php">Повернутися до лабораторної роботи 5</a></p>

<?php
$filename = "files/pivarchuk_text.txt";

if(file_exists($filename)) {
    $text = file_get_contents($filename);
    
    $words = preg_split('/\s+/', preg_replace('/[^\p{L}\s]/u', '', $text));
    $words = array_filter($words);
    
    echo "<h3>5.1. Слова тексту в алфавітному порядку:</h3>";
    $sortedWords = $words;
    sort($sortedWords);
    echo implode(", ", $sortedWords);
    
    echo "<h3>5.2. Два слова, які найчастіше зустрічаються:</h3>";
    $wordCount = array_count_values($words);
    arsort($wordCount);
    $topWords = array_slice($wordCount, 0, 2, true);
    echo "<ul>";
    foreach($topWords as $word => $count) {
        echo "<li>$word - $count разів</li>";
    }
    echo "</ul>";
    
    echo "<h3>5.3. Найдовше слово та його довжина:</h3>";
    $maxLength = max(array_map('mb_strlen', $words));
    $longestWords = array_filter($words, function($word) use ($maxLength) {
        return mb_strlen($word) == $maxLength;
    });
    echo "<ul>";
    foreach($longestWords as $word) {
        echo "<li>$word - " . mb_strlen($word) . " символів</li>";
    }
    echo "</ul>";
    
    echo "<h3>5.4. Найкоротше слово та його довжина:</h3>";
    $minLength = min(array_map('mb_strlen', $words));
    $shortestWords = array_filter($words, function($word) use ($minLength) {
        return mb_strlen($word) == $minLength;
    });
    echo "<ul>";
    foreach($shortestWords as $word) {
        echo "<li>$word - " . mb_strlen($word) . " символів</li>";
    }
    echo "</ul>";
    
    echo "<h3>5.5. Слова, які починаються на літеру 'П':</h3>";
    $pWords = array_filter($words, function($word) {
        return mb_strtoupper(mb_substr($word, 0, 1)) == 'П';
    });
    
    if(count($pWords) > 0) {
        echo implode(", ", $pWords);
    } else {
        echo "Таких слів не знайдено. Додаємо речення: ";
        echo "Програмування на PHP потребує практики і постійного вдосконалення.";
    }
    
    echo "<h3>5.6. Текст із заміною малих літер 'о' на великі 'О':</h3>";
    $replacedText = str_replace('о', 'О', $text);
    echo htmlspecialchars($replacedText);
    
    echo "<h3>5.7. Випадковий абзац тексту:</h3>";
    $paragraphs = explode("\n\n", $text);
    
    $additionalParagraphs = [
        "PHP - мова, яка може бути вбудованою безпосередньо в html-код сторінок, які, в свою чергу коректно будуть оброблені PHP -інтерпретатором. Механізм РНР просто починає виконувати код після першої екрануючої послідовності (<?) і продовжує виконання до того моменту, коли він зустріне парну екрануючу послідовність (?>).",
        "Прикладом мови низького рівня є асемблер. Мови низького рівня орієнтовані на конкретний тип процесора і враховують його особливості, тому для перенесення програми на асемблері на іншу апаратну платформу її потрібно майже повністю переписати",
        "PHP 3.0 був офіційно випущений в червні 1998 року після 9 місяців публічного тестування. Оновлення PHP 4 здійснювалося тільки до кінця 2007 року.",
        "PHP застосовувався при розробці таких CMS, як Drupal, Joomla, PHP-Nuke. З його використанням розроблялися системи для веб комерції - osCommerce і Magento, утиліти адміністрування СУБД - phpMyAdmin, галереї зображень - Gallery Project, Coppermine і багато іншого.",
        "MySQL - це одна з найпопулярніших і найпоширеніших СУБД в Інтернеті завдяки вдалому поєднанні користувацьких властивостей, відкритому коду і добрій технічній підтримці. Офіційний сайт - www.mysql.com"
    ];
    
    $allParagraphs = array_merge($paragraphs, $additionalParagraphs);
    $randomParagraph = $allParagraphs[array_rand($allParagraphs)];
    echo htmlspecialchars($randomParagraph);
    
} else {
    echo "<p>Файл $filename не знайдено!</p>";
}
?>

</body>
</html>