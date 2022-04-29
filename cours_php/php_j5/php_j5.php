<?php

/*
echo filter_input(INPUT_GET, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

echo preg_match('/(foo)(bar)/', 'foobar', $matches); // 1
print_r($matches); //Array ( [0] => foobar [1] => foo [2] => bar )

echo preg_match('#\d#', 'fo0', $matches); // 1

echo preg_match('#[bar](?=[foo])#', 'foobar', $matches); // 0


$numero = "0612345678";
if (preg_match('#(0|\+33)[1-9]( *[0-9]{2}){4}#', $numero)) {
    echo "Le numéro de téléphone entré est correct.";
    // On peut ajouter le numéro à la base de donnée
} else {
    echo "Le numéro de téléphone entré est incorrect.";
    // On ne peut pas ajouter le numéro à la base de donnée
}

$mechantMot = ['bite','chatte','cul'];
public function FunctionName(Type $var = null)
{
for ($i=0; $i < ; $i++) {

    for ($i=0; $i < ; $i++) { 

    }
}
return
}
echo preg_replace();
*/

$wordToCensor = "con";

echo preg_match("#\b$wordToCensor(\b/[^.,])#u", "con.");
?>