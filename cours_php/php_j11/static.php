<?php


class Personne
{
    public static string $message = "Je suis une personne";

    public static function ditBonjour()
    {
        echo "Bonjour !";
        echo static::$message;
        echo self::$message;
    }
}

class Apprenant extends Personne
{
    public static string $message = "Propriété statique surchargé";
    public static function ditPersonne()
    {
        echo parent::$message;
    }
}

$p = new Personne();
echo Personne::$message; // "Propriété statique"
echo $p::$message; // "Propriété statique"
Personne::ditBonjour(); // "Méthode statique"
$p::ditBonjour(); // "Méthode statique"
$obj = new Apprenant();
$obj->ditBonjour();
