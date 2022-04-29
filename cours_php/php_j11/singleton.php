<?php

class Personne
{
    protected static Personne $personne;
    public static int $compteur = 0;

    public static function getInstance() : Personne
    {
        if (!isset(self::$personne)/* && self::$personne instanceof Personne */) {
            self::$personne = new Personne();
        }
        return self::$personne;
    }
    public function __construct()
    {
        self::$compteur++;
    }
}

$p1 = Personne::getInstance();
$p2 = Personne::getInstance();
$p3 = Personne::getInstance();
$p4 = Personne::getInstance();
$p5 = Personne::getInstance();
$p6 = new Personne();
echo Personne::$compteur;
