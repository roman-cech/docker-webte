<?php



namespace App\Model;

use App\Model\Database\Database;

use PDO;
use PDOException;

class Model
{
    private $db;
    private PDO $conn;

    public function __construct()
    {
        $this->db = new Database();

    }

    public function insertQuestions($exam, $question,$answerId, $type, $questionPoints)
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("insert into  test.Questions (exam_id,question, answer_id, type, question_points) 
                                            VALUE (:exam_id,:question,:answer_id,:type,:question_points)");
            $stmt->bindParam(':exam_id', $exam);
            $stmt->bindParam(':question', $question);

            $stmt->bindParam(':answer_id', $answerId);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':question_points', $questionPoints);
            return $stmt->execute();

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }


    public function insertAnswers($userId, $questionId, $type, $answer)
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("insert into  test.answers (user_id, question_id, type, answer) 
                                            VALUE (:user_id,:question_id,:type,:answer)");
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':question_id', $questionId);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':answer', $answer);
            return $stmt->execute();

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }



    public function insertUser($token,$name,$surname,$ais_id,$email,$password)
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("insert into  test.Users (token,name, surname, ais_id, email, password) 
                                            VALUE (:token,:name,:surname,:ais_id,:email,:password)");
            $stmt->bindParam(':token', $token);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':surname', $surname);
            $stmt->bindParam(':ais_id', $ais_id);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            return $stmt->execute();

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function insertExam($exam_code,$userId,$title,$timeLimit,$isActive,$examPoints)
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("insert into  test.Exams (exam_code, user_id, title,time_limit, is_active, exam_points) 
                                            VALUE (:exam_code,:user_id,:title,:time_limit,:is_active,:exam_points)");
            $stmt->bindParam(':exam_code', $exam_code);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':time_limit', $timeLimit);
            $stmt->bindParam(':is_active', $isActive);
            $stmt->bindParam(':exam_points', $examPoints);
            return $stmt->execute();

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }


    public function getUserId()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select id from test.Users where ais_id = null");

            $stmt->execute();
            return $stmt->rowCount();

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function getExamId()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select id from test.Exams");

            $stmt->execute();
            return $stmt->rowCount();

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }



    public function getLastQuestionId()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select id from test.Questions");

            $stmt->execute();
            return $stmt->rowCount();

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function getLastAnswerId()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select id from test.answers");

            $stmt->execute();
            return $stmt->rowCount();

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }



}
