<?php
include "../../app/vendor/autoload.php";
use App\Model\LogsModel;

//error_reporting(0);
$contr = new LogsModel();

session_start();

$user = $contr->selectTeacher($_SESSION['email']);

?>

<div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; top: 200" >
    <nav class="uk-navbar-container" uk-navbar="dropbar: true;" style="position: relative; z-index: 980;">
        <div class="uk-navbar-left">

            <ul class="uk-navbar-nav">
                <li><a type="button" class="uk-button" data-toggle="modal" data-target="#myModal2">Vytvoriť Test</a></li>
                <li><a type="button" class="uk-button" data-toggle="modal" data-target="#myModal">Vytvoriť Otázky k Testu</a></li>
                <li><a type="button" class="uk-button" data-toggle="modal" data-target="#myModal3">Testy</a></li>
                <li><a type="button" class="uk-button" data-toggle="modal" data-target="#myModal4">Testy Študentov</a></li>
                <li><a type="button" class="uk-button" data-toggle="modal" data-target="#myModal5">Sledovanie Testov</a></li>
            </ul>

        </div>
        <div class="uk-navbar-right">

            <ul class="uk-navbar-nav">
                <li><a><i uk-icon="users"></i></a></li>
                <li><a><p><?php echo "<i>".$user[0]['name']." ".$user[0]['surname']."</i>";?><br><?php echo $user[0]['email'];?></p></a></li>
                <li><a href="../logs/logout.php" type="button" class="uk-button" >Odhlásiť sa</a></li>
            </ul>

        </div>
    </nav>
</div>