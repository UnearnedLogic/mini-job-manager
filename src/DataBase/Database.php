<?php

namespace App\DataBase;
use PDO;
use PDOException;

class Database {
    public PDO $pdo;
    public function __construct() {
        try {
            $dsn = 'mysql:host=127.0.0.1;dbname=jobboard';
            $user = 'unearned';
            $password = '021271';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            $this->pdo = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            die("DB Error: " . $e->getMessage() . PHP_EOL);
        }
    }
}