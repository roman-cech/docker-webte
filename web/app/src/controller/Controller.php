<?php

namespace App\Controller;

use App\Model\Database\Database;

use PDO;

class Controller
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function initProject(): string
    {
        return "Webte2";
    }
}