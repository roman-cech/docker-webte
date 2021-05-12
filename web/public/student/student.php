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
    <!-- --------------------- -->
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit-icons.min.js"></script>


    <link href="../assets/css/style.css">
    <script src="https://zwibbler.com/zwibbler-demo.js"></script>

</head>

<body>
<div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; top: 200" >
    <nav class="uk-navbar-container" uk-navbar="dropbar: true;" style="position: relative; z-index: 980;">
        <div class="uk-navbar-center">

            <ul class="uk-navbar-nav">
                <li><a href="#" class="uk-button">CLOCKS</a></li>
            </ul>

        </div>
        <div class="uk-navbar-right">

            <ul class="uk-navbar-nav">
                <li><a href="#" type="button" class="uk-button" >Send Test</a></li>
            </ul>

        </div>
    </nav>
</div>
<div class="container">
    <div class="exam-paper" style="width: 60em; border: 2px solid #444; box-shadow: 5px 5px 5px #555; margin: 2em auto; text-align: center">
        <h2>Exam 1</h2>
        <?php

        $model = new GetQuestionModel();
        $controller = new GetQuestionController();

        //TODO:
        $exam_id = 1;

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

        <form action="student.php" method="post">

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

            <div>

                <zwibbler z-controller="mycontroller">
                    <button z-click="ctx.newDocument()">New</button>
                    <button z-click="mySave()">Save</button>
                    <button z-click="myOpen()">Open</button>
                    <div z-canvas style="height:300px"></div>
                </zwibbler>


            </div>

            <button type="submit" class="btn btn-success m-3">Odoslať</button>

        </form>

        <button name="logout"><a href="../logs/Logout.php">Logout</a></button>

    </div>
</div>

<script>


    Zwibbler.controller("mycontroller", (scope) => {
        let saved = "";
        const ctx = scope.ctx;
        scope.mySave = () => {
            saved = ctx.save("svg");
            alert("Saved: " + saved);
            console.log(saved);
        }

        scope.myOpen = () => {
            if (!saved) {
                alert("Please save first.");
                return;
            }

            ctx.load(saved);
        }
    })

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="../assets/js/Jquery.js"></script>
</body>
</html>

