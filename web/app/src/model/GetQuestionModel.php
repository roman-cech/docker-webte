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

    public function getShortQuestions($exam_id)
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.Questions where type = 'Krátka odpoveď' and exam_id = $exam_id ");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

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



    public function getChooseQuestions($exam_id)
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.Questions where type = 'Výber správnej odpovede' and exam_id = $exam_id");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }



    public function getChooseAnswers($answer_id)
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.Answers where  question_id = $answer_id ");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function getPairQuestions($exam_id)
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.Questions where type = 'Párovanie odpovedí'  and exam_id = $exam_id  ");

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

    public function getDrawThing($exam_id)
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.Questions where type = 'Nakreslenie obrázka'  and exam_id = $exam_id ");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }


    public function getMathQuestions($exam_id)
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select * from test.Questions where type = 'Matematický výraz'  and exam_id = $exam_id");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }



}