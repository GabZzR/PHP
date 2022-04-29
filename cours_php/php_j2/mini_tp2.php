<?php

$data = [6,-1,5,1];

$tab = [25,30,-16,15,-5];

$result = [];

$tabLength = count($tab);

// sort($tab);

foreach ($tab as $value) {
    //echo $value;
    echo PHP_EOL;
}


for ($i=0; $i < $tabLength; $i++) { 
    
    $indexLower = 0;

    for ($j=1; $j < count($tab); $j++) { 
        if ($tab[$indexLower] > $tab[$j]) {
        $indexLower = $j;
        }
    }

    $result[] = array_splice ($tab, $indexLower,1)[0];
}
var_dump($result);



/*
$splice[] = array_splice ($tab, $indexLower,1);

$result[] = $splice[0];

echo $indexLower;
echo $tab[$indexLower];

$alphabet = range("A","Z");
$iLetters = count($alphabet);

echo $alphabet;
echo $iLetters;
*/