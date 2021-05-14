<?php



namespace App\Model;

use App\Model\Database\Database;

use App\Classes\ShowTest;


use PDO;
use PDOException;

$class = new ShowTest();

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


    public function insertAnswers($userId, $questionId, $type, $answer, $correctAnswer)
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("insert into  test.answers (user_id, question_id, type, answer, correct_answer) 
                                            VALUE (:user_id,:question_id,:type,:answer,:correct_answer)");
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':question_id', $questionId);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':answer', $answer);
            $stmt->bindParam(':correct_answer', $correctAnswer);
            return $stmt->execute();

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function insertPoints($examId, $userId, $points1, $points2, $points3, $points4, $points5, $points6, $points7, $points8, $points9, $points10, $points11, $allPoints) {

        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("insert into test.Points (exam_id, student_id, question1_points, question2_points, question3_points, question4_points, question5_points, question6_points, question7_points, question8_points, question9_points, question10_points, question11_points, all_points)
                                           VALUES (:exam_id, :student_id, :question1_points, :question2_points, :question3_points, :question4_points, :question5_points, :question6_points, :question7_points, :question8_points, :question9_points, :question10_points, :question11_points, :all_points)");
            $stmt->bindParam(':exam_id', $examId);
            $stmt->bindParam(':student_id', $userId);
            $stmt->bindParam(':question1_points', $points1);
            $stmt->bindParam(':question2_points', $points2);
            $stmt->bindParam(':question3_points', $points3);
            $stmt->bindParam(':question4_points', $points4);
            $stmt->bindParam(':question5_points', $points5);
            $stmt->bindParam(':question6_points', $points6);
            $stmt->bindParam(':question7_points', $points7);
            $stmt->bindParam(':question8_points', $points8);
            $stmt->bindParam(':question9_points', $points9);
            $stmt->bindParam(':question10_points', $points10);
            $stmt->bindParam(':question11_points', $points11);
            $stmt->bindParam(':all_points', $allPoints);
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

    public function getUserId($email)
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select id from test.Users where email = '$email'");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

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

    public function getAllExams()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select id,exam_code,title,time_limit,is_active,exam_points from test.Exams;");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS,ShowTest::class);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function getExams()
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select id from test.Exams;");

            $stmt->execute();
            return $stmt->rowCount();

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function getTitleExam($examId)
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select title from test.Exams where id = :id;");
            $stmt->bindParam(':id', $examId);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function getStudent($studentId)
    {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("select name,surname from test.Users where id = :id;");
            $stmt->bindParam(':id', $studentId);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function getStudentsTestInfo() {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("SELECT Users.name, Users.surname, Users.ais_id, Points.all_points, Exams.title, Exams.exam_code, Exams.id AS 'examID', Users.id AS 'userID' FROM test.Points JOIN test.Users ON Points.student_id = Users.id JOIN test.Exams ON Points.exam_id = Exams.id");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function getStudentTestAnswers($examId, $studentId) {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("SELECT question, test.Answers.type, test.Answers.answer, test.Answers.correct_answer FROM test.Questions JOIN test.Answers ON test.Answers.question_id = Questions.id WHERE Answers.user_id = :student_id AND Questions.exam_id = :exam_id");

            $stmt->bindParam(':student_id', $studentId);
            $stmt->bindParam(':exam_id', $examId);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function headers(){
        header('Content-Type: application/json;charset=utf-8');
        header('Content-Type: text/html; charset=utf-8');
    }
}
