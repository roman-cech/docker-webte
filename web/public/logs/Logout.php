<?php
include "../../app/vendor/autoload.php";
session_start();
unset($_SESSION['loggedin']);

header("Location: logIn_Student.php");
exit;

?>