<?php
include "../../app/vendor/autoload.php";

use App\Model\LogsModel;

//error_reporting(0);




if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['password']) && isset($_POST['email']))
{
    $controller = new LogsModel();

    $controller->insertTeacher($_POST['name'],$_POST['surname'],$_POST['email'],sha1($_POST['password']));
    header("Location: logIn_Teacher.php");
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

</head>
<body>

<form action="register_Teacher.php" method="post">
    Name: <input type="text" name="name"><br>
    Surname: <input type="text" name="surname"><br>
    Password: <input type="password" name="password"><br>
    Email : <input type="email" name="email"><br>

    <input type="submit" value="Register">
    <a href="logIn_Teacher.php"><input type="button" value="Back to Log In"></a>
</form>

</body>
</html>
