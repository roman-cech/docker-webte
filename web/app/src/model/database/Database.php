<?php

namespace App\Model\Database;

use Dotenv;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use PDO;
use PDOException;

class Database {

    private $conn;

    public function getConnection(): ?PDO
    {
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" .  $_ENV["MYSQL_HOST"] . ";dbname=" . $_ENV["MYSQL_DATABASE"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"]);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exception){
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }
}