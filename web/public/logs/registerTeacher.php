<?php
include "../../app/vendor/autoload.php";

use App\Model\LogsModel;

//error_reporting(0);




if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['password']) && isset($_POST['email']))
{
    $controller = new LogsModel();

    $controller->insertTeacher($_POST['name'],$_POST['surname'],$_POST['email'],sha1($_POST['password']));
    header("Location: loginTeacher.php");
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
                    <form class="uk-margin-medium" action="registerTeacher.php" method="post">
                        <h3 class="uk-heading-line uk-text-center"><span>Registrácia</span></h3>
                        <div  class="uk-margin">
                            <div id="down_line" class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: user"></span>
                                <input class="uk-input" type="text" name="name" placeholder="Meno" id="name" onclick="teacherRegistrationValidate()">
                            </div>
                        </div>
                        <div  class="uk-margin">
                            <div id="down_line" class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: user"></span>
                                <input  class="uk-input"  type="text" name="surname" placeholder="Priezvisko" id="surname" onclick="teacherRegistrationValidate()">
                            </div>
                        </div>
                        <div  class="uk-margin">
                            <div id="down_line" class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                <input  class="uk-input"  type="password" name="password" placeholder="Heslo" id="password" onclick="teacherRegistrationValidate()">
                            </div>
                        </div>
                        <div  class="uk-margin">
                            <div id="down_line" class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                <input  class="uk-input"  type="email" name="email" placeholder="E-mail" id="email" onclick="teacherRegistrationValidate()">
                            </div>
                        </div>

                        <input class="uk-button uk-button-default" type="submit" value="Registrovať">

                        <a href="loginTeacher.php"><input class="uk-button uk-button-default" type="button" value="Prihlásiť"></a>
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
<script src="../assets/js/studentScript.js"></script>
</html>
