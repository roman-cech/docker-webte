<?php


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
    <div class="exam-paper" style="width: 60em; border: 2px solid #444; box-shadow: 5px 5px 5px #555; margin: 2em auto; text-align: center">
        <h2>Exam 1</h2>
        <?php

        $model = new GetQuestionModel();
        $controller = new GetQuestionController();
        //get count of short questions
        $countShort = $model->countShortQuestion();

        $result = $model->getShortQuestions();
        $obj = getJsonDecode($result);

        $tmp = 1;
        echo "<h2>Otázky s krátkou odpovedou</h2>";

        for($i=0;$i<2;$i++){
            echo $controller->displayShortQuestions($tmp++,$obj[$i]->question) . "<br>";
        }

        // questions with choose answer
        $resultMore = $model->getChooseQuestions();
        $objChoose = getJsonDecode($resultMore);

        $resultChooseAnswers = $model->getChooseAnswers();
        $objAnswers = getJsonDecode($resultChooseAnswers);

        //add answers to array
        $firstArrOfChooseAnswers = explode(",",$objAnswers[0]->answer);
        $secondArrOfChooseAnswers = explode(",",$objAnswers[1]->answer);

        echo "<h2>Otázky s výberom správnej odpovede</h2>";

        echo $controller->displayQuestions($tmp++,$objChoose[0]->question);
        for($i=0;$i<=2;$i++){
            echo $controller->displayChooseAnswers($i,$firstArrOfChooseAnswers[$i]);
        }

        echo $controller->displayQuestions($tmp++,$objChoose[1]->question);
        for($i=0;$i<=2;$i++){
            echo $controller->displayChooseAnswers($i,$secondArrOfChooseAnswers[$i]);
        }


        //get Pair questions
        $resultPair = $model->getPairQuestions();
        $pairJson = getJsonDecode($resultPair);

        $resultPairAnswer = $model->getPairAnswers();
        $pairAnswers = getJsonDecode($resultPairAnswer);

        echo "<h2>Párovacie otázky</h2>";
        echo "<h3>$tmp Otázka</h3>";
        $tmp++;
        echo $controller->displayPairQuestion($pairJson[0]->question,$pairAnswers[1]->answer);
        // echo $controller->displayAnswers($pairAnswers[1]->answer);
        echo $controller->displayPairQuestion($pairJson[1]->question,$pairAnswers[0]->answer);
        //   echo $controller->displayAnswers($pairAnswers[0]->answer);


        echo "<h2>Nakresli</h2>";
        $resultDraw = $model->getDrawThing();
        $drawJson = getJsonDecode($resultDraw);

        echo $controller->draw($tmp++,$drawJson[0]->question);


        echo "<h2>Otázky s odpovedou matematického výrazu</h2>";
        $resultMath = $model->getMathQuestions();
        $mathJson = getJsonDecode($resultMath);

        echo $controller->displayQuestions($tmp++,$mathJson[0]->question);
        echo $controller->displayQuestions($tmp++,$mathJson[1]->question);


        //TODO: vytvorit funkcionality pre matematické vzorce, kontrolovanie správnosti odpovedi,
        //TODO: vytvorit funkcionalitu pre párovacie otázky
        //TODO: kreslenie pre kresliacu otázku
        //TODO: vymyslieť ako odoslať veci, a zároveň skontrolovat odpovede a spraviť refaktirizáciu kodu
        ?>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="../assets/js/Jquery.js"></script>
</body>
</html>

