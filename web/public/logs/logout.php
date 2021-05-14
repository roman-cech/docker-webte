<?php
include "../../app/vendor/autoload.php";
session_start();
unset($_SESSION['loggedin']);

header("Location: loginStudent.php");
exit;

?>