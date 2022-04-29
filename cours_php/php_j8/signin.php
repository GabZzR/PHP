<?php

$args = [ //On prépare un tableau bien mettre les clefs qui correspondent au POST,
    'email' => [
        'filter' => FILTER_VALIDATE_REGEXP, //Filtre a appliquer
        'options' => [
            'regexp' => '#^[\w._-]+@[a-z]+\.[a-z]{2,}$#iu' //on ne précise pas le {1} car par default le premier char
        ]
    ],
    'pwd' => []
];
$user = filter_input_array(INPUT_POST, $args);

if (isset($user['email']) && isset($user['pwd'])) {
    /** Vérifies que les variables sont vide (false, NULL, 0, "", []) */
    if (empty($user['email'])) {
        $error_message[] = "Email incorrect";
    }
    if (empty($user['pwd'])) {
        $error_message[] = "Mot de passe requis";
    }
    /** Vérifies que $error_messags n'existe pas */
    if (!isset($error_messages)) {
        $dbh = new PDO(
            "mysql:host=localhost;dbname=test;charset=UTF8",
            'root',
            '',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
        $sth = $dbh->prepare('SELECT * FROM user WHERE email = :email');
        $sth->execute([':email' => $user['email']]);
        $result = $sth->fetch(PDO::FETCH_ASSOC);

        if (!empty($result) && $result['pwd'] === $user['pwd']) {
            session_start();
            $_SESSION['isLogged'] = true;
            header('Location: blog.php');
            die;
        } else {
            $error_messages[] = 'Email ou mot de passe incorrect';
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
<?php 
    /** Vérifies que $error_messages existe. Si il existe, c'est qu'il y a des messages d'erreur à afficher */
    if (isset($error_messages)) : ?>
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
        <label for="email"></label>
        <input type="text" name="email" id="email">
        <br>
        <label for="pwd"></label>
        <input type="password" name="pwd" id="pwd">
        <button type="submit">Envoyez</button>
    </form>
</body>

</html>