<?php

include "../../app/vendor/autoload.php";

use App\Model\LogsModel;

//error_reporting(0);
$contr = new LogsModel();

session_start();


$udaje= $contr->selectTeacher($_POST['email']);

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){

    header("Location: ../teacher/teacher.php");
}

if (isset($_POST['email'] )&& isset($_POST['password']))
{

    if(($udaje[0]['email'] === $_POST['email']) && ($udaje[0]['password'] === sha1($_POST['password'])))
    {
        $_SESSION["loggedin"] = true;
        $_SESSION['email'] = $udaje[0]['email'];
        header("Location: ../teacher/teacher.php");
    }
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
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
                    <?php include "nav_LogIn.php";?>
                    <form class="uk-margin-medium" action="logIn_Teacher.php" method="post">

                        <div  class="uk-margin">
                            <div id="down_line" class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                <input class="uk-input" type="email" name="email" placeholder="E-mail">
                            </div>
                        </div>
                        <div  class="uk-margin">
                            <div id="down_line" class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: unlock"></span>
                                <input  class="uk-input"  type="password" name="password" placeholder="Password">
                            </div>
                        </div>

                        <input class="uk-button uk-button-default" type="submit" value="Sing In">

                        <a href="register_Teacher.php"><input class="uk-button uk-button-default" type="button" value="Register"></a>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default "></div>
        </div>
    </div>

</main>


</body>
</html>
