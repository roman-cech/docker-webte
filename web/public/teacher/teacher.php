<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
session_start();

include "../../app/vendor/autoload.php";

use App\Controller\Controller;
use App\Model\Model;

$model = new Model();

$url = $_GET['token'];

function timeToMinutes($time)
{
    return $time - strtotime("now");
}


function getJsonDecode($res){
    $tmp = json_encode($res);
    return json_decode($tmp);
}

//
//$model->insertExam("QW30",1,"zapocet",true,25);

if (isset($_GET['token'])) {
    $tokenString = bin2hex(random_bytes(3));
    $_SESSION['newToken'] = $tokenString;
}

echo $_SESSION['newToken'];

if (isset($_POST['title-test'])) {

    $examCode = $_SESSION['newToken'];

    //TODO $userId

    $titleTest = $_POST['title-test'];
    $timeLimit = $_POST['time-limit'];
    $time = timeToMinutes(time() + (1 * 1 * $timeLimit * 1));
    $isActive = $_POST['is-active'];
    $examPoints = $_POST['points'];

    $model->insertExam($examCode, 1, $titleTest, $time, $isActive, $examPoints);

    echo "insert successfully";
}


//check if form with short questions was submitted
if (isset($_POST['first-short-q'])) {

//    //  checking for values
//    echo "<h4>typ 1</h4>";
//
//    echo $_POST['first-short-q'] . "<br>";
//    echo $_POST['first-short-answer'] . "<br>";
//    echo $_POST['second-short-q'] . "<br>";
//    echo $_POST['second-short-answer'] . "<br>";
//    echo "<h4>typ 2</h4>";
//    echo $_POST['first-more-q'] . "<br>";
//    echo $_POST['first-more-answer'] . "<br>";
//    echo $_POST['second-more-q'] . "<br>";
//    echo $_POST['second-more-answer'] . "<br>";
//    echo "<h4>typ 3</h4>";
//
//    echo $_POST['first-pair-q'] . "<br>";
//    echo $_POST['first-pair-answer'] . "<br>";
//    echo $_POST['second-pair-q'] . "<br>";
//    echo $_POST['second-pair-answer'] . "<br>";
//    echo "<h4>typ 4</h4>";
//
//    echo $_POST['draw-q'] . "<br>";
//    echo "<h4>typ 5</h4>";
//
//    echo $_POST['first-math-q'] . "<br>";
//    echo $_POST['second-math-q'] . "<br>";


  //  echo $_SESSION['newToken'];


    //create controller for inserting values
    $controller = new Controller();

    //tmp for answers

    $answerId = $model->getLastAnswerId();
    $questionId = $model->getLastQuestionId();
    $answerId++;
    $questionId++;

    $examId = $model->getExamId();

    //TODO: toto sa bude priradovat z loginu, treba do teacherModel spravit funkciu pre ziskanie userID
    $resultUserId = $model->getUserId($_SESSION['email']);
    $tmpUserId = getJsonDecode($resultUserId);
    $userID = $tmpUserId[0]->id;

    //create a variables for questions,answers && insert values


    //short questions
    $firstQuestion = $_POST['first-short-q'];
    $controller->insertQuestion($examId, $firstQuestion, $answerId++, "Krátka odpoveď", 1);

    $firstShortAnswer = $_POST['first-short-answer'];
    $controller->insertAnswers($userID, $questionId++, "Krátka odpoveď", $firstShortAnswer);

    $secondQuestion = $_POST['second-short-q'];
    $controller->insertQuestion($examId, $secondQuestion, $answerId++, "Krátka odpoveď", 1);

    $secondShortAnswer = $_POST['second-short-answer'];
    $controller->insertAnswers($userID, $questionId++, "Krátka odpoveď", $secondShortAnswer);


    //questions  with right answer

    $thirdQuestion = $_POST['first-more-q'];
    $controller->insertQuestion($examId, $thirdQuestion, $answerId++, "Výber správnej odpovede", 1);

    $firstMoreAnswer = [];
    array_push($firstMoreAnswer, $_POST['first-more-answer']);
    array_push($firstMoreAnswer, $_POST['first-more-answer2']);
    array_push($firstMoreAnswer, $_POST['first-more-answer3']);

    $controller->insertAnswers($userID, $questionId++, "Výber správnej odpovede", implode(",", $firstMoreAnswer));

    $fourQuestion = $_POST['second-more-q'];
    $controller->insertQuestion($examId, $fourQuestion, $answerId++, "Výber správnej odpovede", 1);

    $secondMoreAnswer = [];
    array_push($secondMoreAnswer, $_POST['second-more-answer']);
    array_push($secondMoreAnswer, $_POST['second-more-answer2']);
    array_push($secondMoreAnswer, $_POST['second-more-answer3']);
    $controller->insertAnswers($userID, $questionId++, "Výber správnej odpovede", implode(",", $secondMoreAnswer));


    //pair questions
    $fifthQuestion = $_POST['first-pair-q'];
    $controller->insertQuestion($examId, $fifthQuestion, $answerId++, "Párovanie odpovedí", 1);

    $firstPairAnswer = $_POST['first-pair-answer'];
    $controller->insertAnswers($userID, $questionId++, "Párovanie odpovedí", $firstPairAnswer);

    $sixQuestion = $_POST['second-pair-q'];
    $controller->insertQuestion($examId, $sixQuestion, $answerId++, "Párovanie odpovedí", 1);

    $secondPairAnswer = $_POST['second-pair-answer'];
    $controller->insertAnswers($userID, $questionId++, "Párovanie odpovedí", $secondPairAnswer);


    //draw questions and where answer from teacher is not present then put 0 into DB
    $drawQuestion = $_POST['draw-q'];
    $controller->insertQuestion($examId, $drawQuestion, 0, "Nakreslenie obrázka", 1);


    //math questions and where answer from teacher is not present then put 0 into DB
    $firstMathQuestion = $_POST['first-math-q'];
    $controller->insertQuestion($examId, $firstMathQuestion, 0, "Matematický výraz", 1);

    $secondMathQuestion = $_POST['second-math-q'];
    $controller->insertQuestion($examId, $secondMathQuestion, 0, "Matematický výraz", 1);


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
    <!--  Bootstrap libraries  -->
    <script src="https://kit.fontawesome.com/44b171361e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- --------------------- -->
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; top: 200">

    <nav class="uk-navbar-container">
        <div class="uk-container uk-container-expand">
            <div uk-navbar>

                <ul class="uk-navbar-nav">
                    <li class="uk-active"><a href="#">Active</a></li>
                    <li>
                        <a href="#">Parent</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-active"><a href="#">Active</a></li>
                                <li><a href="#">Item</a></li>
                                <li><a href="#">Item</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#">Item</a></li>
                </ul>

            </div>
        </div>
    </nav>
</div>

<div class="container">

    <a href="?token=" class="btn btn-success">vygeneruj exam kod</a>
    <br>
    <br>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal2">Vytvor Test</button>
    <br>
    <!-- Modal -->
    <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Vytvorenie nového Testu</h4>
                </div>
                <div class="modal-body" style="width: auto">
                    <div class="container">
                        <form action="teacher.php" method="post">

                            <h4>Vytvoriť nový Test</h4>

                            <div class="mb-3">
                                <label for="title-test"><strong>Názov testu</strong></label>
                                <input type="text" name="title-test" id="title-test">
                            </div>

                            <div class="mb-3">
                                <label for="time-limit"><strong>Časový limit</strong></label>
                                <input type="text" name="time-limit" id="time-limit"">
                            </div>

                            <div class="mb-3">
                                <label for="is-active"><strong>Zaradiť test medzi aktívne</strong></label>
                                <input type="number" name="is-active" id="is-active" min="0" max="1" placeholder="1">
                            </div>

                            <div class="mb-3">
                                <label for="points"><strong>Počet bodov za test</strong></label>
                                <input type="number" name="points" id="points" min="1" max="100" placeholder="25">
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


    <br>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Vytvor Otázky k testu
    </button>

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
                                <input type="text" name="first-short-q" id="first-short-q">
                            </div>


                            <div class="mb-3">
                                <label for="first-short-answer"><strong>odpoveď</strong></label>
                                <input type="text" name="first-short-answer" id="first-short-answer">
                            </div>

                            <div class="mb-3">
                                <label for="second-short-q"><strong>2.otázka</strong></label>
                                <input type="text" name="second-short-q" id="second-short-q">
                            </div>

                            <div class="mb-3">
                                <label for="second-short-answer"><strong>odpoveď</strong></label>
                                <input type="text" name="second-short-answer" id="second-short-answer">
                            </div>


                            <h4>otazky s výberom správnej odpovede</h4>

                            <div class="mb-3">
                                <label for="first-more-q"><strong>3.otázka</strong></label>
                                <input type="text" name="first-more-q" id="first-more-q">
                            </div>

                            <div class="mb-3">
                                <label for="first-more-answer"><strong>odpovede</strong></label>
                                <input type="text" name="first-more-answer" id="first-more-answer"> <br>
                                <input type="text" name="first-more-answer2" id="first-more-answer2"><br>
                                <input type="text" name="first-more-answer3" id="first-more-answer3"><br>

                            </div>

                            <div class="mb-3">
                                <label for="second-more-q"><strong>4.otázka</strong></label>
                                <input type="text" name="second-more-q" id="second-more-q">
                            </div>

                            <div class="mb-3">
                                <label for="second-more-answer"><strong>odpovede</strong></label>
                                <input type="text" name="second-more-answer" id="second-more-answer"><br>
                                <input type="text" name="second-more-answer2" id="second-more-answer2"><br>
                                <input type="text" name="second-more-answer3" id="second-more-answer3"><br>

                            </div>

                            <h4>párovacie otázky</h4>

                            <div class="mb-3">
                                <label for="first-pair-q"><strong>5.otázka</strong></label>
                                <input type="text" name="first-pair-q" id="first-pair-q">
                            </div>

                            <div class="mb-3">
                                <label for="first-pair-answer"><strong>odpoveď</strong></label>
                                <input type="text"  name="first-pair-answer" id="first-pair-answer">
                            </div>

                            <div class="mb-3">
                                <label for="second-pair-q"><strong>6.otázka</strong></label>
                                <input type="text" name="second-pair-q" id="second-pair-q">
                            </div>

                            <div class="mb-3">
                                <label for="second-pair-answer"><strong>odpoveď</strong></label>
                                <input type="text"  name="second-pair-answer" id="second-pair-answer">
                            </div>

                            <div class="mb-3">
                                <label for="third-pair-q"><strong>7.otázka</strong></label>
                                <input type="text"  name="third-pair-q" id="third-pair-q">
                            </div>

                            <div class="mb-3">
                                <label for="third-pair-answer"><strong>odpoveď</strong></label>
                                <input type="text"  name="third-pair-answer" id="third-pair-answer">
                            </div>

                            <div class="mb-3">
                                <label for="four-pair-q"><strong>8.otázka</strong></label>
                                <input type="text"  name="four-pair-q" id="four-pair-q">
                            </div>

                            <div class="mb-3">
                                <label for="four-pair-answer"><strong>odpoveď</strong></label>
                                <input type="text"  name="four-pair-answer" id="four-pair-answer">
                            </div>

                            <h4>odpoveď vyžaduje napísanie matematického výrazu</h4>

                            <div class="mb-3">
                                <label for="draw-q"><strong>Nakresli</strong></label>
                                <input type="text" name="draw-q" id="draw-q">
                            </div>

                            <h4>odpoveď vyžaduje napísanie matematického výrazu</h4>
                            <div class="mb-3">
                                <label for="first-math-q"><strong>9.otázka</strong></label>
                                <input type="text"  name="first-math-q" id="first-math-q">
                            </div>


                            <div class="mb-3">
                                <label for="second-math-q"><strong>10.otázka</strong></label>
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

    <button name="logout"><a href="../logs/Logout.php">Logout</a></button>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
<script src="../assets/js/Jquery.js"></script>
</body>
</html>