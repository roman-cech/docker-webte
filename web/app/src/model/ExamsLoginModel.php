<?php

namespace App\Model;

use App\Model\Database\Database;

use PDO;
use PDOException;

class ExamsLoginModel {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getActiveExam() {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("SELECT * FROM test.Exams WHERE is_active = 1");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function insertStudentWritingExam($examId, $studentId) {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("INSERT INTO test.ExamsLogin (exam_id,user_id,finished,leave_tab)
                                            VALUES (:exam_id,:user_id,:finished,:leave_tab)");

            $finished = 0;
            $leaveTab = 0;

            $stmt->bindParam(':exam_id', $examId);
            $stmt->bindParam(':user_id', $studentId);
            $stmt->bindParam(':finished', $finished);
            $stmt->bindParam(':leave_tab', $leaveTab);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function updateWritingStudentStat($examId, $studentId, $finished, $leaveTab) {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("UPDATE test.ExamsLogin
                                                           SET finished = :finished, leave_tab = :leave_tab
                                                           WHERE exam_id = :exam_id AND user_id = :user_id");

            $stmt->bindParam(':exam_id', $examId);
            $stmt->bindParam(':user_id', $studentId);
            $stmt->bindParam(':finished', $finished);
            $stmt->bindParam(':leave_tab', $leaveTab);

            $stmt->execute();

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }

    public function getStudentWritingExam($examId) {
        try {
            $conn = new Database();
            $conn->getConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->getConnection()->prepare("SELECT ExamsLogin.exam_id, ExamsLogin.finished, ExamsLogin.leave_tab, Users.name, Users.surname FROM test.ExamsLogin JOIN Users ON ExamsLogin.user_id = Users.id WHERE ExamsLogin.exam_id=" . $examId);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }
}