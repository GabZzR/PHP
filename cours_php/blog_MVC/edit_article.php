<?php
/**
 * Recupères l'id de l'article dans le query string et on vérifie que ce n'est pas vide
 * 
 * @var int $id_article identifient de l'article
 */
$id_article = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);



if (!empty($id_article)) {

    /**
     * Récupere la methode de la requete HTTP
     * 
     * @var string $requestMethod
     */
    require 'article_sql.php';

    $dbh = databaseGenerator();

    $sth = $dbh->prepare("SELECT * FROM article WHERE id_article = :id_article");

    $sth->execute([":id_article" => $id_article]);

    $article = $sth->fetch(PDO::FETCH_ASSOC);
}

$requestMethod = filter_input(INPUT_SERVER, "REQUEST_METHOD");

if ("POST" === $requestMethod) {
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
        /** Vérifies que les variables sont vide (false, NULL, 0, "", []) */
        if (empty($article['title'])) {
            $error_message[] = "Contenu inexistant";
        }

        if (empty(trim($article['content']))) {
            $error_message[] = "Contenu inexistant";
        }
        /** Vérifies que $error_messags n'existe pas */
        if (empty($error_messages)) {
            $article["id"] = $id_article;
            editArticle($article);
            /** Rediriges vers ma page "blog.php" à l'ancre de l'article édité */
            header(sprintf('Location: /php_j8/blog.php#article%d', $id_article));
            die;
        }
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
    <?php if (isset($error_message)) : ?>
        <ul>
            <?php foreach ($error_messages as $message) : ?>
                <li><?= $message ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="" method="post">
        <label for="title">Titre : </label>
        <input type="text" id="title" name="title" value="<?= $article['title'] ?>">
        <br>
        <label for="content">Contenu : </label>
        <textarea name="content" id="content" cols="30" rows="10"><?= $article['content'] ?></textarea>
        <button type="submit">Envoyez</button>
    </form>
</body>

</html>