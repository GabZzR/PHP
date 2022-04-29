<?php

$db = new PDO(
    "mysql:host=some_host;dbname=some_database_name;charset=UTF8",
    "user",
    "password", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);
