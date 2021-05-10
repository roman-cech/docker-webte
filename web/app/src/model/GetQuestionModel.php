<?php

namespace App\Model;

use App\Model\Database\Database;

use PDO;
use PDOException;

class GetQuestionModel {


    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getShortQuestions()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.Questions where type = 'Krátka odpoveď' ");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function countShortQuestion()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.Questions where type = 'Krátka odpoveď'");

            $stmt->execute();
            return $stmt->rowCount();


        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function getChooseQuestions()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.Questions where type = 'Výber správnej odpovede' ");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }



    public function getChooseAnswers()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.answers where type = 'Výber správnej odpovede' ");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function getPairQuestions()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.Questions where type = 'Párovanie odpovedí' ");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function getPairAnswers()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.answers where type = 'Párovanie odpovedí' ");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function getDrawThing()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.Questions where type = 'Nakreslenie obrázka' ");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }


    public function getMathQuestions()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.Questions where type = 'Matematický výraz' ");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }
    public function countMoreQuestion()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.Questions where type = 'Výber správnej odpovede'");

            $stmt->execute();
            return $stmt->rowCount();


        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }






    public function getShortAnswers()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.answers where type = 'Krátka odpoveď' ");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }
}