<?php

echo filter_input(INPUT_SERVER, "REQUEST_METHOD");
echo "<br>";

var_dump($_GET);
echo "<br>";
echo "<a href=\"superglobale.php?page=bar\">Clic</a>";
echo "<br>";
echo "<a href=\"superglobale.php?page=baz\">Clic</a>";
echo "<br>";

if (!array_key_exists("page", $_GET)) {
    echo "Page d'accueil";
}elseif ($_GET['page'] === "bar") {
    echo "J'affiche des trucs";
} elseif ($_GET['page'] === "baz") {
    echo "J'affiche d'autre truc";
}



echo filter_input(INPUT_GET, "foo");
echo filter_input(INPUT_GET, "oof");
