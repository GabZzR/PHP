<?php

class Personne
{
    public $message = 'Je suis une personne';

    function ditBonjour()
    {
        echo 'Bonjour';
    }
}

class Apprenant extends Personne
{
    public $nom = "John Doe";

    function ditMessage()
    {
        echo $this->message . " " . $this->nom;
    }
}

$obj = new Apprenant();
$obj->ditBonjour();

echo $a->message; 

class Visibilite
{
    public $publicProperty = "Public property";

    public function publicMethod()
    {
        echo "Public method";
    }
}

$obj = new Visibilite();
echo $obj->publicProperty; // Public property
$obj->publicMethod(); // Public method


/*
class NotVisibilite
{
    private $privateProperty = "Private property";   

    private function privateMethod()
    {
        echo "Private method";
    }
}

$obj = new NotVisibilite();
echo $obj->privateProperty; // Fatal Error
$obj->privateMethod(); // Fatal Error
*/
?>