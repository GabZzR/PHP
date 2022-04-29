<?php

namespace Core;

use PDO;
use Core\Database;

abstract class AbstractDao
{
    protected Database $dbh;

    public function __construct()
    {
        $this -> $dbh = Database::getInstance(); 
    }
}
