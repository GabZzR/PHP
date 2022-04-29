<?php


/**
 * Génères un objet PDO avec une connection à la base de données
 *
 * @return PDO Objet Connecté à la base de donnée
 */
function databaseGenerator() : PDO
{
    return new PDO(
        "mysql:host=localhost;dbname=test;charset=UTF8",
        "root",
        "",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );
}

/**
 * Récupères de la base de données tous les articles
 *
 * @return array Tableau de tableaux associatifs d'articles
 */
function getAllArticle() : array
{
    $dbh = databaseGenerator();

$sth = $dbh->prepare("SELECT * FROM article");

$sth->execute();

return $sth->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Récuperes de la base de données un article en fonction de son id
 *
 * @param integer $id identifiant de l'article qu'on doit récupérer de la bdd
 * @return array Tableau associatif de l'article récupéré
 */
function getArticleById(int $id) : array {

    //On reprend la fonction databaseGenerator 
    $dbh = databaseGenerator();

     //Requete qui permet de selectionner tout de ma table 'article'
     $sth = $dbh->prepare("SELECT * FROM article WHERE id_article = :id_article");

     //Exécuter la requete
     $sth ->execute([':id_article' => $id]);     //:id_article Correspond à un parametre nommé
 
     //On retourne un tableau associatif pour récupérer l'article 
     return $sth->fetch(PDO::FETCH_ASSOC);
}

/**
 * Ajoutes un article à la base de données
 *
 * @param array $article Tableau associatif de l'article à ajouter à la bdd
 * @return integer Renvoi l'identifiant de l'article ajouté
 */
function newArticle() : int
{
    return 1;
}

/**
 * Edites un article de la base de données
 *
 * @param array $article Tableau associatif de l'article à editer
 * @return void
 */
function editArticle(array $article) : void
{
    $dbh = databaseGenerator();
    $sth = $dbh -> prepare("UPDATE article SET title = :title, content = :content WHERE id_article = :id_article");
    $sth->execute([
        ':title' => $article['title'],
        ':content' => $article['content'],
        ':id_article' => $article['id'],
    ]);
}

/**
 * Supprimes un article de la base de données
 *
 * @param integer $id Identifiant de l'article à supprimer
 * @return void
 */
function deleteArticle(int $id) : void {

    $dbh = databaseGenerator();

    //Requete qui permet de supprimer un 'article'
    $sth = $dbh->prepare("DELETE FROM article WHERE id_article = :id_article");

    //Exécuter la requete
    $sth ->execute([':id_article' => $id]); //:id_article Correspond à un parametre nommé

}

function getUserByEmail(string $email) : array
{
    $dbh = databaseGenerator();
    //Requete qui permet de supprimer un 'article'
    $sth = $dbh->prepare("SELECT * FROM user WHERE email = :email");
    //Exécuter la requete
    $sth ->execute([':email' => $email]); //:id_article Correspond à un parametre nommé
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return ($result) ? $result : null;
}