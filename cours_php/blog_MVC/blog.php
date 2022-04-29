<?php

session_start();

/**
 * On requiert le fichier "article_sql.php"
 *
 * "require_once" requiert le fichier qu'une seule et unique fois,
 * même si on a déjà fait appel à ce fichier
 */
//require 'article_sql.php';
include 'article_sql.php';

$article = getAllArticle();



    $dbh = databaseGenerator();

    $sth = $dbh->prepare("SELECT * FROM article");

    $sth->execute();

    $result = $sth->fetch(PDO::FETCH_ASSOC);

    require_once 'Article.php';




return $result;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style></style>
</head>

<body>
    <?php if (isset($_SESSION['isLogged'])) : ?>
    <a href="new_article.php">Create article</a>
    <?php endif; ?>
    <br>
    <?php foreach ($article as $value) {
        echo"<h2>". $value["title"]."</h2>";
        echo "<br>";
        if (isset($_SESSION['isLogged'])) {
            echo '<a href="edit_article.php?id=' . $value["id_article"] . '">Edit</a>';
            echo "  ";
            echo '<a href="delete_article.php?id=' . $value["id_article"] . '">Delete</a>';
        }
        echo "<br>";
        echo $value["content"];
        echo "<br> <br>";
    } ?>
</body>

</html>