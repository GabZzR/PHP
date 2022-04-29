<?php

function passwordGenerator(int $longueur)
{

    $alphabet = range("A", "Z");
    $alphabetMin = range("a", "z");
    $number = range(0, 9);
    $special = range("!", "/");
    $megaGab = [$alphabet, $number, $special, $alphabetMin];
    $randomForce = [];
    $result = "";
    $compteur = 0;
    $found = false;

    array_push($special, "?");

    for ($i = 0; $i < 4; $i++) {
        array_push($randomForce, rand(0, $longueur));
    }


    for ($i = 0; $i < $longueur; $i++) {
        $found = false;
        for ($j = 0; $j < count($randomForce) ; $j++) {
            if ($i == $j) {
                $result .= prerequis();
                $found = true;
            }
        }
        if ($found == false) {
            $iRandom = rand(0, 3);
            $result .= $megaGab[$iRandom][rand(0, count($megaGab[$iRandom]) - 1)];
        }
    }
    return $result;
};

echo passwordGenerator(10);
function rollDice(&$tirage)
{
$found = false;
$dice = rand(0,3);
for ($i=0; $i < count($tirage) ; $i++) { 
    
    if($dice == $tirage[$i])
    {
       $found=true;
       
    }
}
    if($found){
        rollDice($tirage);
    }else{
        echo "j ai tire : ".$dice;
    return $dice;
    }
}


function prerequis()
{
    $alphabet = range("A", "Z");
    $alphabetMin = range("a", "z");
    $number = range(0, 9);
    $special = range("!", "/");
    

    static $tirage = [];
    $dice = rollDice($tirage);

   foreach($tirage as $value)
{
    echo " |tirage: ".$value ;
}    
echo "<BR><BR><BR>";


    switch ($dice) {
        case 0:
            array_push($tirage, 0);
            return $alphabet[rand(0, count($alphabet) - 1)];
            break;
        case 1:

            array_push($tirage, 1);
            return $alphabetMin[rand(0, count($alphabetMin) - 1)];
            break;
        case 2:

            array_push($tirage, 2);
            return $number[rand(0, count($number) - 1)];
            break;
        case 3:

            array_push($tirage, 3);
            return $special[rand(0, count($special) - 1)];
            break;
    }
}
