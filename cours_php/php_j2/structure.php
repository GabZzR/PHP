<?php
$foo = 1;
echo $foo;
echo PHP_EOL;
echo $foo++;
//echo --$foo;
echo "<br>";
echo $foo;

echo "<br>";

if ($foo != "1") {
    echo "vrai";
} else {
    echo "faux";
}
echo "<br>";

if (true === 1) {
} else if (true == '1') {
    echo 'true';
} else {
}
echo "<br>";

$name = "John ";
echo "Hello " . $name;
$str = "Hello ";
echo $str .= $name;
$str = "Hello ";
echo $str = $str . $name;

try {
    new Foo();
    echo 'try';
} catch (Throwable $e) {
    echo 'catch'; // catch
}
