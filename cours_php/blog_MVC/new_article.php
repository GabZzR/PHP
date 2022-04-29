<?php

// $title = filter_input(INPUT_POST,"title",FILTER_VALIDATE_REGEXP,["regexp" => '#^[A-Z)#u']);
// $content = filter_input(INPUT_POST,"content");


/**
 * Tableau d'arguments qui va nous permettre de récupérer les données souhaitées dans filter_input_array
 * Les données qu'on souhaite récuperer sont : "title" et "content"
 * Et on a décidé de passer des filtres avec leurs options à "title"
 */
$args = [ //On prépare un tableau bien mettre les clefs qui correspondent au POST,
    'title' => [
        'filter' => FILTER_VALIDATE_REGEXP, //Filtre a appliquer
        'options' => [
            'regexp' => '#^[A-Z]#u' //on ne précise pas le {1} car par default le premier char
        ]
    ],
    'content' => []
];

$article = filter_input_array(INPUT_POST, $args); //filter pour tableau

/** Vérifies que les variables existent et qu'elles ne sont pas NULL */
if (isset($article['title']) && isset($article['content'])) {
    /** Vérifies que les variables sont vide (false, NULL, 0, **, []) */
    if (empty($article['title'])) {
        $error_message[] = "Contenu inexistant";
    }
    if (empty(trim($article['content']))) {
        $error_message[] = "Contenu inexistant";
    }
/** Vérifies que $error_messages existe et que vide */
    if (empty($error_message)) {
        require 'article_sql.php';

        $dbh = databaseGenerator();

        $sth = $dbh->prepare("INSERT INTO article (title, content) VALUES(?,?)");

        $sth->bindvalue(1, $article["title"]);
        $sth->bindvalue(2, $article["content"]);

        $sth->execute();
        header(sprintf('Location: blog.php#article%d', $dbh->lastInsertId()));
        die;
    }
}
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
    <?php 
    /** Vérifies que $error_messages existe. Si il existe, c'est qu'il y a des messages d'erreur à afficher */
    if (isset($error_message)) : ?>
        <ul>
            <?php
            /**
             * Parses le tableau de messages d'erreurs
             * 
             * @var string $message Un message d'erreur à afficher
             */ 
            foreach ($error_messages as $message) : ?>
                <li><?= $message ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="" method="post">
        <label for="title">Titre : </label>
        <input type="text" id="title" name="title">
        <br>
        <label for="content">Contenu : </label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <button type="submit">Envoyez</button>
    </form>
</body>

</html>