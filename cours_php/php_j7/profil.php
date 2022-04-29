<?php

$idPersonne = filter_input(INPUT_GET,"id",FILTER_SANITIZE_SPECIAL_CHARS);

if(empty(trim($idPersonne))){
    header("location:pdo.php");
    die;
}
$dbh = new PDO(
    "mysql:host=localhost;dbname=test;charset=UTF8",
    "root",
    "",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);

$sth = $dbh->prepare("SELECT * FROM personne WHERE id = :id");

$sth -> bindValue(":id",$idPersonne); 

$sth->execute();

$sth->setFetchMode(PDO::FETCH_ASSOC);

$personne = $sth->fetch();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
</head>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Mail</th>
            <th>Action</th>
        </tr>
      
            <tr>
                <td><?= $personne["id"] ?></td>
                <td><?= $personne["nom"] ?></td>
                <td><?= $personne["prenom"] ?></td>
                <td><?= $personne["mail"] ?></td>
                <td> <a href="pdo.php">Retour</a> </td>
            </tr>
    </table>

</body>