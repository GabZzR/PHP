<?php

namespace App;

class Personne{
    const GENRE = "masculin";
// protected const GENRE = "masculin";

    public function showConstant()
    {
        echo self::GENRE;
    }
}

$p = new Personne();

$p -> showConstant();

echo Personne::GENRE;

echo $p::GENRE;

echo Personne::class;

echo $p::class;
