<?php

include "../../app/vendor/autoload.php";


use App\Model\Model;

if(isset($_POST['points-for-draw']) && isset($_POST['points-for-first-math']) && isset($_POST['points-for-second-math'])){

    $model = new Model();

    $examId = $_POST['examId'];
    $studentId = $_POST['studentId'];

    $tmpAllPoints = $model->getAllPoints($examId,$studentId);
    $allPoints = json_decode(json_encode($tmpAllPoints));


    $points = $allPoints[0]->all_points;


    $points += $_POST['points-for-draw'] + $_POST['points-for-first-math'] + $_POST['points-for-second-math'];

    $model->updatePoints($examId,$studentId,$_POST['points-for-first-math'],$_POST['points-for-second-math'],$_POST['points-for-draw'],$points);

    header("Refresh:0; url=teacher.php");
}



if(isset($_GET["examId"]) && isset($_GET["studentId"])) {

    $model = new Model();

    $studentInfo = $model->getStudent($_GET['studentId']);
    $student = json_decode(json_encode($studentInfo),false, 512, JSON_UNESCAPED_UNICODE);

    $data = $model->getStudentTestAnswers($_GET["examId"],$_GET["studentId"]);

    $exam_id = $_GET['examId'];
    $student_id = $_GET['studentId'];

    $model->headers();

    $test = json_decode(json_encode($data));

//    print_r($test);
    $firstMathQuestion = $test[4]->question;
    $firstMathAnswer = $test[4]->answer;

    $secondMathQuestion = $test[5]->question;
    $secondMathAnswer = $test[5]->answer;


    $drawQuestion = $test[6]->question;
    $image = $test[6]->answer;

    $studentFullName = $student[0]->name. '  ' . $student[0]->surname;


    echo '<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Student</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-Lidth, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/44b171361e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- --------------------- -->
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/css/uikit.min.css"/>

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit-icons.min.js"></script>


    <link href="../assets/css/style.css">
    <script src="https://zwibbler.com/zwibbler-demo.js"></script>

    <link rel="stylesheet" href="../assets/css/style.css">

    <script src="https://unpkg.com/mathlive/dist/mathlive.min.js"></script>
    
    </head>
    

<body>
<div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; top: 200">
    <nav class="uk-navbar-container" uk-navbar="dropbar: true;" style="position: relative; z-index: 980;">

        <div class="uk-navbar-right">

            <ul class="uk-navbar-nav">
                <li><a type="button" class="uk-button" name="logout" href="../teacher/teacher.php">BACK</a></li>
            </ul>

        </div>
    </nav>
</div>
<div class="container">

    <div class="uk-text-center" uk-grid>
        <div class="uk-width-auto@m">
            <div class="uk-card uk-card-default "></div>
        </div>
        <div class="uk-width-expand@m">
            <div id="test" class="uk-card uk-card-default uk-card-body">';


    echo "
            
             <h2 class='.uk-text-bolder'>Oprava odpovedí : </h2>
             
             <h4>Študent  $studentFullName</h4>
             
             <h3 style='border-bottom: 2px solid black;padding: 1em'>Nakreslenie obrázka : </h3>
             <br>
            <strong>Nakresli : $drawQuestion</strong>
            
            <img src='$image' width='400' height='150'>
            <br>
            <br>
            <br>
              <form action='fixTest.php' method='post'>
            <label for='points-for-draw'>Zadať počet bodov</label>
            <input type='number' id='points-for-draw' name='points-for-draw' class='.uk-form-success'>
            
            <br>
            <br>
            <br>
            
             <h3 style='border-bottom: 2px solid black; padding: 1em' >Odpoveď pomocou matematického výrazu : </h3>
             <br>
            <strong>Výraz : $firstMathQuestion</strong>
            <br>
            <br>
            <strong>Odpoveď :   $firstMathAnswer</strong>
            
             <br>
            <br>
            <label for='points-for-first-math'>Zadať počet bodov</label>
            <input type='number' id='points-for-first-math' name='points-for-first-math' class='.uk-form-success'>      
             
             <br>
            <br>
             <br>
            <strong>Výraz : $secondMathQuestion</strong>
            <br>
            <br>
            <strong>Odpoveď :   $secondMathAnswer</strong>
            
             <br>
            <br>
            <label for='points-for-second-math'>Zadať počet bodov</label>
            <input type='number' id='points-for-second-math' name='points-for-second-math' class='.uk-form-success'>
            
               <br>
            <br>
            
            <input type='hidden' value='$exam_id' name='examId'>
            <input type='hidden' value='$student_id' name='studentId'>
            <button type='submit' class='btn btn-success'>Odoslať vyhodnotenie</button>
        </form>
            
    ";


    echo '
    </div>
</div>
</div>
</body>
</html>';


}