<?php

$alphabet = range("A", "Z");
$word = "CONSTANTINOPLE";
$wordList = str_split($word);
$result = "";

foreach ($wordList as $value) {
    echo $value;
    for ($i = 0; $i < count($alphabet); $i++) {

        if ($value == $alphabet[$i]) {
            $result .= $alphabet[$i + 3];
        }
    }
}
echo "<br>";
echo PHP_EOL;
echo $result;