<?php

session_start();

include "../../app/vendor/autoload.php";

use App\Controller\GetQuestionController;
use App\Model\GetQuestionModel;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function getJsonDecode($res){
    $tmp = json_encode($res);
    return json_decode($tmp);
}
?>


<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Student</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-Lidth, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/44b171361e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
    <div class="exam-paper" style="width: 60em; border: 2px solid #444; box-shadow: 5px 5px 5px #555; margin: 2em auto; text-align: center;background-color: #fff">
        <?php

        $model = new GetQuestionModel();
        $controller = new GetQuestionController();

        $resultExamID = $model->getExamId($_SESSION['examCode']);
        $examID = getJsonDecode($resultExamID);

        echo "<h2> Exam :  ".$examID[0]->title."</h2>";

        $exam_id = $examID[0]->id;
        //get Short questions
        $resShort = $model->getShortQuestions($exam_id);
        $shortQ = getJsonDecode($resShort);

        //tmp for num questions
        $tmp = 1;

        //get choose right answer questions
        $resChoose = $model->getChooseQuestions($exam_id);
        $chooseQ = getJsonDecode($resChoose);

        //get choose right answers for first
        $firstChooseAnswers = $model->getChooseAnswers($chooseQ[0]->answer_id);
        $objFirstAnswers = getJsonDecode($firstChooseAnswers);
        $arrFirstAnswers = explode(",",$objFirstAnswers[0]->answer);
        //get choose right answers for second
        $secondChooseAnswers = $model->getChooseAnswers($chooseQ[1]->answer_id);
        $objSecondAnswers = getJsonDecode($secondChooseAnswers);
        $arrSecondAnswers = explode(",",$objSecondAnswers[0]->answer);

        //TODO: vytvorit funkcionality pre matematické vzorce, kontrolovanie správnosti odpovedi,
        //TODO: vytvorit funkcionalitu pre párovacie otázky
        //TODO: kreslenie pre kresliacu otázku

        ?>

                <div class="mb-3" >
                    <label for="short-first"><?php echo "(". $tmp++ .". Uloha\t):\t". $shortQ[0]->question ?></label>
                    <br>
                   <strong>Odpoveď: </strong> <input type="number" name="short-first" id="short-first">
                    <br>
                </div>
                <br>
                <div class="mb-3" >
                    <label for="short-second"><?php echo "(". $tmp++ .". Uloha\t):\t". $shortQ[1]->question ?></label>
                    <br>
                    <strong>Odpoveď: </strong> <input type="number" name="short-second" id="short-second">
                    <br>
                </div>
            <div class="mb-3" >
                <label for="choose-first"><?php echo "(". $tmp++ .". Uloha\t):\t". $chooseQ[0]->question ?></label>
                <br>
                <label for="first-choose-answer"><?php echo $arrFirstAnswers[0]?></label>
                <input type="checkbox" name="first-choose-answer" id="first-choose-answer">
                <br>
                <label for="second-choose-answer"><?php echo $arrFirstAnswers[1]?></label>
                <input type="checkbox" name="second-choose-answer" id="second-choose-answer">
                <br>
                <label for="third-choose-answer"><?php echo $arrFirstAnswers[2]?></label>
                <input type="checkbox" name="third-choose-answer" id="third-choose-answer">
                <br>
            </div>
            <div class="mb-3" >
                <label for="choose-first"><?php echo "(". $tmp++ .". Uloha\t):\t". $chooseQ[1]->question ?></label>
                <br>
                <label for="first-choose-answer"><?php echo $arrSecondAnswers[0]?></label>
                <input type="checkbox" name="first-choose-answer" id="first-choose-answer">
                <br>
                <label for="second-choose-answer"><?php echo $arrSecondAnswers[1]?></label>
                <input type="checkbox" name="second-choose-answer" id="second-choose-answer">
                <br>
                <label for="third-choose-answer"><?php echo $arrSecondAnswers[2]?></label>
                <input type="checkbox" name="third-choose-answer" id="third-choose-answer">
                <br>
            </div>



        <button name="logout"><a href="../logs/Logout.php">Logout</a></button>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="../assets/js/Jquery.js"></script>
</body>
</html>

