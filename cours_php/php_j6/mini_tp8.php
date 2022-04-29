<?php

if(file_exists('compteur_visites.txt'))
{
        $compteur_f = fopen('compteur_visites.txt', 'r+');
        $compte = fgets($compteur_f);
        $compte++;
        fseek($compteur_f, 0);
        fputs($compteur_f, $compte);
}
else
{
        $compteur_f = fopen('compteur_visites.txt', 'a+');
        $compte = 0;
}



fclose($compteur_f);
echo '<strong>'.$compte.'</strong> visites.';
?>

