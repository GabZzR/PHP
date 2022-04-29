<?php
$foo = 'Pierre';              // Assigne la valeur 'Pierre' à $foo
$bar = &$foo;                 // Référence $foo avec $bar.
$bar = "Mon nom est $bar";  // Modifie $bar...
echo $foo;                    // $foo est aussi modifiée
echo $bar;
?>