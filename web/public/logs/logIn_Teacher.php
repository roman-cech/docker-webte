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

</head>
<body>
<?php include "nav_LogIn.php";?>

<form action="logIn_Teacher.php" method="post">
    Email: <input type="text" name="email"><br>
    Password: <input type="text" name="password"><br>

    <input type="submit">
    <a href="register_Teacher.php"><input type="button" value="Register"></a>
</form>

</body>
</html>
