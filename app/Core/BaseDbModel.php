<?php
declare(strict_types=1);

namespace Com\Daw2\Core;

use \PDO; 

abstract class BaseDbModel {
    protected $pdo;

    function __construct() {
        $this->pdo = DBManager::getInstance()->getConnection();      
    }
}
