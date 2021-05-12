<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
session_start();


include "../../app/vendor/autoload.php";

use App\Controller\Controller;
use App\Model\Model;
use App\Classes\ShowTest;

$class = new ShowTest();


function getJsonDecode($res){
    $tmp = json_encode($res);
    return json_decode($tmp);
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
<style>

    /*.switch #slide-input {*/
    /*    opacity: 0;*/
    /*    width: 0;*/
    /*    height: 0;*/
    /*}*/

    /*.slider {*/
    /*    position: relative;*/
    /*    cursor: pointer;*/
    /*    top: 0;*/
    /*    left: 0;*/
    /*    right: 0;*/
    /*    bottom: 0;*/
    /*    background-color: #ccc;*/
    /*    -webkit-transition: .4s;*/
    /*    transition: .4s;*/
    /*}*/

    /*.slider:before {*/
    /*    position: absolute;*/
    /*    content: "";*/
    /*    height: 26px;*/
    /*    width: 26px;*/
    /*    left: 4px;*/
    /*    !*bottom: 4px;*!*/
    /*    background-color: white;*/
    /*    -webkit-transition: .4s;*/
    /*    transition: .4s;*/
    /*}*/

    /*#slide-input:checked + .slider {*/
    /*    background-color: #2196F3;*/
    /*}*/

    /*#slide-input:focus + .slider {*/
    /*    box-shadow: 0 0 1px #2196F3;*/
    /*}*/

    /*#slide-input:checked + .slider:before {*/
    /*    -webkit-transform: translateX(26px);*/
    /*    -ms-transform: translateX(26px);*/
    /*    transform: translateX(26px);*/
    /*}*/

    /*!* Rounded sliders *!*/
    /*.slider.round {*/
    /*    border-radius: 34px;*/
    /*}*/

    /*.slider.round:before {*/
    /*    border-radius: 50%;*/
    /*}*/

</style>

<body>
<?php include "nav_Teacher.php"?>
<div class="container">

    <table class="table table-striped table-light text-dark">
        <thead>
        <tr>
            <th>Kod Testu</th>
            <th>Test</th>
            <th>Časový limit testu</th>
            <th>Počet bodov za test</th>
            <th>Aktivovať / Deaktivovať</th>
        </tr>
        </thead>
        <tbody>
            <?php
                $model = new Model();
                $result = $model->getAllExams();

                foreach ($result as $value){
                    echo $value->showTable();
                }
            ?>
        </tbody>
    </table>

</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
<script src="../assets/js/Jquery.js"></script>
</body>
</html>