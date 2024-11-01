<?php

namespace App;

use PDO;
use PDOException;

class Database {
    private object $connection;

    public function __construct() {
        $host = 'db';
        $dbname = 'postgres';
        $username = 'username';
        $password = 'password';

        try {
            $this->connection = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Ошибка подключения: " . $e->getMessage());
        }
    }

    public function getConnection(): object {
        return $this->connection;
    }
}
