<?php

//session_start();
use App\Model\LogsModel;

include "../../app/vendor/autoload.php";

$model = new LogsModel();

if($_SERVER['REQUEST_METHOD']==='POST')
{
    if (isset($_POST['zapisovanie']) && isset($_POST['id'])) {
        $model->updateIs_Active_Buttons($_POST['zapisovanie'], $_POST['id']);
    }

}



