<?php

//session_start();

include "../../app/vendor/autoload.php";

use App\Controller\Controller;
use App\Model\LogsModel;

$model = new LogsModel();

if($_SERVER['REQUEST_METHOD']==='POST')
{
    if (isset($_POST['zapisovanie']) && isset($_POST['id'])) {
        $model->updateIs_Active_Buttons($_POST['zapisovanie'], $_POST['id']);
    }

}



