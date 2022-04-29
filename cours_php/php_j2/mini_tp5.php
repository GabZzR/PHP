<?php

// tp1

$tab = [25, 30, -16, 15, 5, -5];

function tp1(array $tab): int
{

    foreach ($tab as $value) {

        if (0 === $value) {
            $closetToZero = $value;
            break;
        }

        if (!isset($closetToZero)) {
            $closetToZero = $value;
            continue;
        }


        if (abs($closetToZero) > abs($value)) {
            $closetToZero = $value;
        } elseif (abs($closetToZero) === abs($value) && $closetToZero < $value) {
            $closetToZero = $value;
        }
    }
    return $closetToZero;
};

echo tp1($tab);
echo "<br><br>";

// tp2

$tab2 = [25, 30, -16, 15, -5];

function tp2(array $tab): array
{

    $result = [];

    $tabLength = count($tab);

    for ($i = 0; $i < $tabLength; $i++) {

        $indexLower = 0;

        for ($j = 1; $j < count($tab); $j++) {
            if ($tab[$indexLower] > $tab[$j]) {
                $indexLower = $j;
            }
        }

        $result[] = array_splice($tab, $indexLower, 1)[0];
    }
    return $result;
};

foreach (tp2($tab2) as $value) {
    echo $value;
    echo PHP_EOL;
}

tp2($tab2);
echo "<br><br>";

// tp3

function tp3(int $nbr)
{
    for ($i = 1; $i < $nbr; $i++) {

        for ($j = 1; $j < $nbr; $j++) {

            echo $i * $j;
        }
        echo "<br>";
    }
};

tp3(11);
echo "<br><br>";

// tp4

function tp4(string $word, int $nbr): string
{
    $alphabet = range("A", "Z");
    $wordList =  str_split(strtoupper($word));
    $result = "";

    foreach ($wordList as $value) {

        for ($i = 0; $i < count($alphabet); $i++) {

            if ($value == $alphabet[$i]) {
                if ($i + $nbr >= count($alphabet)) {
                    $result .= $alphabet[$i + $nbr - count($alphabet)];
                } else if($i + $nbr < 0){
                    $result .= $alphabet[$i + $nbr + count($alphabet)];
                    
                } else {
                    $result .= $alphabet[$i + $nbr];
                }
            }
        }
    }
    return $result;
};
$test = tp4("bAtEaU", 6);

echo $test;
echo "<br><br>";
