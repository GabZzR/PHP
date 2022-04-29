<?php 

/*$data = [1,2,3,4,5,6,7,8,9];

foreach ($data as $value) {
    echo $value;
}*/

echo "<br> <br>";

$dataLeRetour = ['a','b','c','d','e','f','g'];

foreach ($dataLeRetour as $key => $value) {
    echo $key;
    echo $value;
    echo PHP_EOL;
}

echo "<br> <br>";

$tab = [25, 30, -16, 15, -5, 5];

$tab2 = [];

foreach ($tab as $value){

    if ($value < 0) {
        echo $value;
        echo PHP_EOL;
        $tab2[] = $value;
    }
}

echo "<br> <br>";

arsort($tab2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
         <?php
        foreach ($dataLeRetour as $key => $value) :?>
        <li><?= $value;?> </li>
        <?php endforeach; ?>
    </ul>
    <ul>
         <?php
        foreach ($tab2 as $value) :?>
        <li><?= $value;?> </li>
        <?php endforeach; ?>
    </ul>
    
</body>
</html>