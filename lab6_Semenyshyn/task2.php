<?php
require '../../config.php';

function findAndHighlight($text, $searchTerm) {
    $sentences = preg_split('/(?<=[.!?])\s+/', $text);
    $results = [];
    
    foreach ($sentences as $sentence) {
        $count = preg_match_all('/'. preg_quote($searchTerm, '/') .'/ui', $sentence, $matches);
        if ($count > 0) {
            $highlightedSentence = preg_replace('/(' . preg_quote($searchTerm, '/') . ')/ui', '<i>$1</i>', $sentence);
            $results[] = ['sentence' => $highlightedSentence, 'count' => $count];
        }
    }
    
    usort($results, function($a, $b) {
        return $b['count'] - $a['count'];
    });
    
    return $results;
}
?>
<html>
<head>
    <title>Завдання 2</title>
</head>
<body>
<h2>Завдання 2</h2>
<p><a href="lab6.php">Повернутися до лабораторної роботи 6</a></p>

<form method="post">
    <label for="searchTerm">Введіть слово для пошуку:</label>
    <input type="text" id="searchTerm" name="searchTerm">
    <input type="submit" value="Пошук">
</form>

<?php
$text = file_get_contents('text.txt');

echo "<h3>Пошук слова 'тег':</h3>";
$results = findAndHighlight($text, 'тег');
if (count($results) > 0) {
    foreach ($results as $result) {
        echo $result['sentence'] . " (Знайдено: " . $result['count'] . ")<br><br>";
    }
} else {
    echo "Слово 'тег' не знайдено в тексті.<br>";
}

echo "<h3>Пошук слова 'HTML':</h3>";
$results = findAndHighlight($text, 'HTML');
if (count($results) > 0) {
    foreach ($results as $result) {
        echo $result['sentence'] . " (Знайдено: " . $result['count'] . ")<br><br>";
    }
} else {
    echo "Слово 'HTML' не знайдено в тексті.<br>";
}

if (isset($_POST['searchTerm']) && !empty($_POST['searchTerm'])) {
    $searchTerm = $_POST['searchTerm'];
    echo "<h3>Пошук слова '$searchTerm':</h3>";
    $results = findAndHighlight($text, $searchTerm);
    if (count($results) > 0) {
        foreach ($results as $result) {
            echo $result['sentence'] . " (Знайдено: " . $result['count'] . ")<br><br>";
        }
    } else {
        echo "Слово '$searchTerm' не знайдено в тексті.<br>";
    }
}
?>

</body>
</html>