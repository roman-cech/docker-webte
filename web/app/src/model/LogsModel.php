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

        $stmt = $this->conn->prepare("SELECT Users.* from test.Users where email = :email");
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        return $stmt->fetchAll();


    }

    /*
    Function selectStudent:
       - input variable is E-mail
       - output variable is array
    */

    public function selectStudent($ais_id){

        $stmt = $this->conn->prepare("SELECT Users.* from test.Users where ais_id = :ais_id");
        $stmt->bindParam(":ais_id",$ais_id);
        $stmt->execute();
        $studentArr = $stmt->fetchAll();

        return $studentArr;
    }
    public function getExamsCode($exam_code){

        $stmt = $this->conn->prepare("SELECT Exams.exam_code, Exams.is_active from test.Exams where exam_code = :exam_code");
        $stmt->bindParam(":exam_code",$exam_code);
        $stmt->execute();
        $studentArr = $stmt->fetchAll();

        return $studentArr;
    }

    public function insertTeacher($name, $surname, $email, $password)
    {

        $stmt = $this->conn->prepare("INSERT Into test.Users ( name, surname, email, password) values(:name,:surname,:email,:password)");

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":surname", $surname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $id = $this->conn->lastInsertId();
    }
    public function insertStudent( $name, $surname, $ais_id)
    {

        $stmt = $this->conn->prepare("INSERT Into test.Users (  name, surname, ais_id) values(:name,:surname,:ais_id)");


        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":surname", $surname);
        $stmt->bindParam(":ais_id", $ais_id);
        $stmt->execute();
        $id = $this->conn->lastInsertId();
    }


    public function updateIs_Active_Buttons($is_active,$exam_code)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE test.Exams SET is_active= :is_active WHERE exam_code = :exam_code");
            $stmt->bindParam(":is_active",$is_active);
            $stmt->bindParam(":exam_code",$exam_code);
            $stmt->execute();

        } catch (PDOException $exception) {
            return "Failed: " . $exception->getMessage();
        }
    }


    public function getHeader($filename) {
        header('Content-Type: application/csv;charset=UTF-8');
        header('Content-Encoding: UTF-8');
        header('Content-type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="'.$filename.'";');
    }

}
