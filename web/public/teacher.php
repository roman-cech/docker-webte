<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../app/vendor/autoload.php";

use App\Controller\Controller;
use App\Model\Model;
$model = new Model();
//$model->insertUser("QW30","miloš","blby",97857,"milos@gmail.com","milosko");
//
//$model->insertExam("QW30",1,"zapocet",true,25);

//check if form with short questions was submitted
if(isset($_POST['first-short-q'])){

    //  checking for values
    echo "<h4>typ 1</h4>";

    echo $_POST['first-short-q'] . "<br>";
    echo $_POST['first-short-answer'] . "<br>";
    echo $_POST['second-short-q'] . "<br>";
    echo $_POST['second-short-answer'] . "<br>";
    echo "<h4>typ 2</h4>";
    echo $_POST['first-more-q'] . "<br>";
    echo $_POST['first-more-answer'] . "<br>";
    echo $_POST['second-more-q'] . "<br>";
    echo $_POST['second-more-answer'] . "<br>";
    echo "<h4>typ 3</h4>";

    echo $_POST['first-pair-q'] . "<br>";
    echo $_POST['first-pair-answer'] . "<br>";
    echo $_POST['second-pair-q'] . "<br>";
    echo $_POST['second-pair-answer'] . "<br>";
    echo "<h4>typ 4</h4>";

    echo $_POST['draw-q'] . "<br>";
    echo "<h4>typ 5</h4>";

    echo $_POST['first-math-q'] . "<br>";
    echo $_POST['second-math-q'] . "<br>";


    //create controller for inserting values
    $controller = new Controller();

    //tmp for answers
    //TODO: ak bude už naplnená tabulka nejakymi otázkami a exams, tak potom treba získať posledné id otázky, a od nej odvíjat
    //TODO: premenné answerId a questionId
    $answerId = 1;
    $questionId= 1;

    //TODO: toto sa bude priradovat z loginu, treba do teacherModel spravit funkciu pre ziskanie userID
    $userID = 1;

    //create a variables for questions,answers && insert values


    //short questions
    $firstQuestion = $_POST['first-short-q'];
    $controller->insertQuestion(1,$firstQuestion,$answerId++,"Krátka odpoveď",1);

    $firstShortAnswer = $_POST['first-short-answer'];
    $controller->insertAnswers($userID,$questionId++,"Krátka odpoveď",$firstShortAnswer);

    $secondQuestion = $_POST['second-short-q'];
    $controller->insertQuestion(1,$secondQuestion,$answerId++,"Krátka odpoveď",1);

    $secondShortAnswer = $_POST['second-short-answer'];
    $controller->insertAnswers($userID,$questionId++,"Krátka odpoveď",$secondShortAnswer);


    //questions  with right answer

    $thirdQuestion = $_POST['first-more-q'];
    $controller->insertQuestion(1,$thirdQuestion,$answerId++,"Výber správnej odpovede",1);

    $firstMoreAnswer = [];
    array_push($firstMoreAnswer,$_POST['first-more-answer']);
    array_push($firstMoreAnswer,$_POST['first-more-answer2']);
    array_push($firstMoreAnswer,$_POST['first-more-answer3']);

    $controller->insertAnswers($userID,$questionId++,"Výber správnej odpovede",implode(",",$firstMoreAnswer));

    $fourQuestion = $_POST['second-more-q'];
    $controller->insertQuestion(1,$fourQuestion,$answerId++,"Výber správnej odpovede",1);

    $secondMoreAnswer = [];
    array_push($secondMoreAnswer,$_POST['second-more-answer']);
    array_push($secondMoreAnswer,$_POST['second-more-answer2']);
    array_push($secondMoreAnswer,$_POST['second-more-answer3']);
    $controller->insertAnswers($userID,$questionId++,"Výber správnej odpovede",implode(",",$secondMoreAnswer));


    //pair questions
    $fifthQuestion = $_POST['first-pair-q'];
    $controller->insertQuestion(1,$fifthQuestion,$answerId++,"Párovanie odpovedí",1);

    $firstPairAnswer = $_POST['first-pair-answer'];
    $controller->insertAnswers($userID,$questionId++,"Párovanie odpovedí",$firstPairAnswer);

    $sixQuestion = $_POST['second-pair-q'];
    $controller->insertQuestion(1,$sixQuestion,$answerId++,"Párovanie odpovedí",1);

    $secondPairAnswer = $_POST['second-pair-answer'];
    $controller->insertAnswers($userID,$questionId++,"Párovanie odpovedí",$secondPairAnswer);


    //draw questions and where answer from teacher is not present then put 0 into DB
    $drawQuestion = $_POST['draw-q'];
    $controller->insertQuestion(1,$drawQuestion,0,"Nakreslenie obrázka",1);


    //math questions and where answer from teacher is not present then put 0 into DB
    $firstMathQuestion = $_POST['first-math-q'];
    $controller->insertQuestion(1,$firstMathQuestion,0,"Matematický výraz",1);

    $secondMathQuestion = $_POST['second-math-q'];
    $controller->insertQuestion(1,$secondMathQuestion,0,"Matematický výraz",1);



    // refresh page
//header("Refresh:0; url=teacher.php");

}



?>



<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Portal</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-Lidth, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/44b171361e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>


<div class="container">

    <br>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Vytvor Test</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Zadefinovať otázky </h4>
                </div>
                <div class="modal-body" style="width: auto">
                    <div class="container">
                        <form action="teacher.php" method="post">

                            <h4>Otázky s krátkou odpovedou</h4>


                            <div class="mb-3">
                                <label for="first-short-q"><strong>1.otázka</strong></label>
                                <input type="text"  name="first-short-q" id="first-short-q">
                            </div>


                            <div class="mb-3">
                                <label for="first-short-answer"><strong>odpoveď</strong></label>
                                <input type="text"  name="first-short-answer" id="first-short-answer">
                            </div>

                            <div class="mb-3">
                                <label for="second-short-q"><strong>2.otázka</strong></label>
                                <input type="text"  name="second-short-q" id="second-short-q">
                            </div>

                            <div class="mb-3">
                                <label for="second-short-answer"><strong>odpoveď</strong></label>
                                <input type="text"  name="second-short-answer" id="second-short-answer">
                            </div>



                            <h4>otazky s výberom správnej odpovede</h4>

                            <div class="mb-3">
                                <label for="first-more-q"><strong>3.otázka</strong></label>
                                <input type="text"  name="first-more-q" id="first-more-q">
                            </div>

                            <div class="mb-3">
                                <label for="first-more-answer"><strong>odpovede</strong></label>
                                <input type="text"  name="first-more-answer" id="first-more-answer"> <br>
                                <input type="text"  name="first-more-answer2" id="first-more-answer2"><br>
                                <input type="text"  name="first-more-answer3" id="first-more-answer3"><br>

                            </div>

                            <div class="mb-3">
                                <label for="second-more-q"><strong>4.otázka</strong></label>
                                <input type="text"  name="second-more-q" id="second-more-q">
                            </div>

                            <div class="mb-3">
                                <label for="second-more-answer"><strong>odpovede</strong></label>
                                <input type="text"  name="second-more-answer" id="second-more-answer"><br>
                                <input type="text"  name="second-more-answer2" id="second-more-answer2"><br>
                                <input type="text"  name="second-more-answer3" id="second-more-answer3"><br>

                            </div>

                            <h4>párovacie otázky</h4>

                            <div class="mb-3">
                                <label for="first-pair-q"><strong>5.otázka</strong></label>
                                <input type="text"  name="first-pair-q" id="first-pair-q">
                            </div>

                            <div class="mb-3">
                                <label for="first-pair-answer"><strong>odpovede</strong></label>
                                <input type="text"  name="first-pair-answer" id="first-pair-answer">
                            </div>

                            <div class="mb-3">
                                <label for="second-pair-q"><strong>6.otázka</strong></label>
                                <input type="text"  name="second-pair-q" id="second-pair-q">
                            </div>

                            <div class="mb-3">
                                <label for="second-pair-answer"><strong>odpovede</strong></label>
                                <input type="text"  name="second-pair-answer" id="second-pair-answer">
                            </div>

                            <h4>odpoveď vyžaduje napísanie matematického výrazu</h4>

                            <div class="mb-3">
                                <label for="draw-q"><strong>Nakresli</strong></label>
                                <input type="text"  name="draw-q" id="draw-q">
                            </div>

                            <h4>odpoveď vyžaduje napísanie matematického výrazu</h4>
                            <div class="mb-3">
                                <label for="first-math-q"><strong>7.otázka</strong></label>
                                <input type="text"  name="first-math-q" id="first-math-q">
                            </div>


                            <div class="mb-3">
                                <label for="second-math-q"><strong>8.otázka</strong></label>
                                <input type="text"  name="second-math-q" id="second-math-q">
                            </div>



                            <button type="submit" class="btn btn-success">vytvoriť</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="assets/js/Jquery.js"></script>
</body>
</html>