<?php

namespace App\Model;

use App\Model\Database\Database;

use PDO;
use PDOException;

class GetAnswerModel {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAnswerById($answer_id) {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.Answers where  id = '$answer_id' ");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }
}