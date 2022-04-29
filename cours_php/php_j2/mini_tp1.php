<?php

/*$data = [6,-1,5,1];

foreach ($data as $key => $value) {
    echo  $key . $value;
}

echo "<br>";

if ($data[3] == 1) {
   echo  $data[3];
}else {
    echo  "Pas Bon";
}*/

$tab = [25,30,-16,15,5,-5];

$a = -5;

$b = 10;

foreach ($tab as $value){

    if (0 === $value) {
        $closetToZero = $value;
        break;
    }

    if (!isset($closetToZero)) {
        $closetToZero = $value;
        continue;
    }


    if (abs($closetToZero)> abs($value)) {
    $closetToZero = $value;
    }elseif (abs($closetToZero) === abs($value) && $closetToZero < $value) {
    $closetToZero = $value;
    
    }

}
echo $closetToZero;