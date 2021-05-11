<?php

namespace App\Model;

use App\Model\Database\Database;

use PDO;
use PDOException;

class LogsModel{

    private PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    /*_________________________LogIn and Registration functions________________________*

         /*
        Function selectTeacher:
           - input variable is E-mail
           - output variable is array
        */

    public function selectTeacher($email){

        $stmt = $this->conn->prepare("SELECT users.* from users where email = :email");
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        $teacherArr = $stmt->fetchAll();

        return $teacherArr;
    }

    /*
    Function selectStudent:
       - input variable is E-mail
       - output variable is array
    */

    public function selectStudent($ais_id){

        $stmt = $this->conn->prepare("SELECT users.* from users where ais_id = :ais_id");
        $stmt->bindParam(":ais_id",$ais_id);
        $stmt->execute();
        $studentArr = $stmt->fetchAll();

        return $studentArr;
    }
    public function getExamsCode($exam_code){

        $stmt = $this->conn->prepare("SELECT exams.exam_code from exams where exam_code = :exam_code");
        $stmt->bindParam(":exam_code",$exam_code);
        $stmt->execute();
        $studentArr = $stmt->fetchAll();

        return $studentArr;
    }

    public function insertTeacher($name, $surname, $email, $password)
    {

        $stmt = $this->conn->prepare("INSERT Into Users ( name, surname, email, password) values(:name,:surname,:email,:password)");

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":surname", $surname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $id = $this->conn->lastInsertId();
    }
    public function insertStudent($name, $surname, $ais_id)
    {

        $stmt = $this->conn->prepare("INSERT Into Users ( name, surname, ais_id) values(:name,:surname,:ais_id)");

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":surname", $surname);
        $stmt->bindParam(":ais_id", $ais_id);
        $stmt->execute();
        $id = $this->conn->lastInsertId();
    }



}