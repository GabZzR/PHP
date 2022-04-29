<?php

$pwd = filter_input(type:INPUT_POST, var_name: "pwd");
$logged = false;

if ('test' === $pwd) {
    setcookie("rememberMe", "true", strtotime(datetime:"+1 day"));
    $logged = true;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php if ($logged) : ?>
<p>J'affiche la phrase secrete</p>
    <?php else : ?>
<form action="" method="post">
    <input type="text" name="pseudo">
    <input type="password" name="mdp">
    <button type="submit">Envoyer</button>
</form>
<?php endif; ?>
</body>
</html>