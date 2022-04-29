<?php

$foo = true;

$foo = "hello";

echo $foo;

if (true) {
    $foo = " olleh";    
}
echo $foo;


$foo = "bar";
$bar = &$foo;
$bar = "baz";
echo $foo;



define("FOOR", 'Hi');

echo FOOR;

$fooe = array('foo','bar','baz',1,2,3);

$fooe[0] = 'oof'; 

$foot = ['foo','bar','baz',1,2,3];

$foot[] = 'end';  

echo $fooe[0];

echo $foot[1];

$colorList = [
    'red' => '#ff0000',

    'green' => '#00ff00',

    'blue' => '#0000ff',
];

echo $colorList['red'];


$obj = new stdClass();

$obj->prop1 = 1;

echo $obj->prop1;

echo '<br>';

$autreObj = new stdClass();

$autreObj -> prop1 = 20;

$memeObj = $obj;

$memeObj -> prop1 = 10;

echo $obj-> prop1;

echo '<br>';

echo $autreObj -> prop1;