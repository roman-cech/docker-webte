<?php
include "../../app/vendor/autoload.php";
$page = basename($_SERVER['REQUEST_URI']);


date_default_timezone_set("Europe/Bratislava");
$opts = [
    'http' => [
        'method' => 'GET',
        'header' => [
            'User-Agent: PHP'
        ]
    ]
];
?>

    <div class="uk-animation-slide-top-small btn-outline-primary">
        <nav class="uk-navbar-center " >
            <div class="uk-navbar-center">
                <ul class="uk-navbar-nav ">
                    <li class="student_button"><a href="loginStudent.php" <?php if ($page == "loginStudent.php") echo 'class="current"' ?>>Študent</a></li>
                    <li class="teacher_button"><a href="loginTeacher.php" <?php if ($page == "loginTeacher.php") echo 'class="current"' ?>>Učiteľ</a></li>
                </ul>
            </div>
        </nav>
    </div>

