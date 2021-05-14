<?php
include "../../app/vendor/autoload.php";
use App\Model\LogsModel;

//error_reporting(0);
$contr = new LogsModel();

session_start();


if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){

    header("Location: ../student/student.php");
}

if (isset($_POST['code'] ) && isset($_POST['aisId']) && isset($_POST['name'] ) && isset($_POST['surname'] ) )
{
    $logArr = $contr->getExamsCode($_POST['code']);
    if (!empty($contr->getExamsCode($_POST['code'])))
    {
        if ($logArr[0]['is_active'] === '1')
        {
            $contr->insertStudent($_POST['name'],$_POST['surname'],$_POST['aisId']);
            $studentInfo= $contr->selectStudent($_POST['aisId']);

            $_SESSION["loggedin"] = true;
            $_SESSION['examCode'] = $_POST['code'];
            $_SESSION['name'] = $studentInfo[0]['name'];
            $_SESSION['aisId'] = $_POST['aisId'];
            $_SESSION['studentId'] = $studentInfo[0]['id'];
            header("Location: ../student/student.php");
        }


    }
}

?>

<!doctype html>
<html lang="en" style="background-image: url('https://getwallpapers.com/wallpaper/full/c/e/f/61064.jpg'); background-size: cover;background-repeat: no-repeat;
    background-attachment: fixed;
    height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">


    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit-icons.min.js"></script>



</head>
<body>


<main >

    <div  class="uk-child-width-1-3 uk-text-center " uk-grid>
        <div>
            <div class="uk-card uk-card-default">  </div>
        </div>
        <div>
            <div id="box" class="uk-margin-large-top uk-card uk-card-default uk-card-body ">
                <div >
                    <?php include "navLogin.php";?>
                    <form class="uk-margin-medium" action="loginStudent.php" method="post" >

                        <div  class="uk-margin">
                            <div id="down_line" class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: hashtag"></span>
                                <input class="uk-input" type="text" name="code" id="code" onclick="studentValidate()">
                            </div>
                        </div>
                        <div  class="uk-margin">
                            <div id="down_line" class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: key">ID</span>
                                <input  class="uk-input"  type="text" name="aisId" id="aisId" onclick="studentValidate()">
                            </div>
                        </div>
                        <div  class="uk-margin">
                            <div id="down_line" class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: user"></span>
                                <input class="uk-input" type="text" name="name" placeholder="Meno" id="name" onclick="studentValidate()">
                            </div>
                        </div>
                        <div  class="uk-margin">
                            <div id="down_line" class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: user"></span>
                                <input class="uk-input" type="text" name="surname" placeholder="Priezvisko" id="surname" onclick="studentValidate()">
                            </div>
                        </div>

                        <input class="uk-button uk-button-default" type="submit" value="Prihlásiť sa">
                        <br>
                        <a href="../index.php" ><button class="uk-button uk-button-default" type="button"  >Dokumentácia</button></a>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default "></div>
        </div>
    </div>

</main>
<script src="../assets/js/studentScript.js"></script>
</body>
</html>