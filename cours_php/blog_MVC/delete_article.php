<?php

$id_article = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!empty($id_article)) {
    require 'article_sql.php';

    $dbh = databaseGenerator();

    $sth = $dbh->prepare("DELETE  FROM article WHERE id_article = :id_article");

    $sth->execute([":id_article" => $id_article]);

    header('Location: blog.php');
    die;
}

?>
