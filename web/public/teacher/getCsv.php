<?php

include "../../app/vendor/autoload.php";

use App\Model\Model;
use App\Model\LogsModel;

if(isset($_GET["examId"]) && isset($_GET["studentId"])) {

    function array_to_csv_download($array, $filename = "export.csv", $delimiter=";") {

        $logsModel = new LogsModel();
        $logsModel->getHeader($filename);
        mb_convert_encoding($filename, 'UTF-16LE', 'UTF-8');
        // open the "output" stream
        // see http://www.php.net/manual/en/wrappers.php.php#refsect2-wrappers.php-unknown-unknown-unknown-descriptioq
        $f = fopen('php://output', 'w');

        $model = new Model();
        $data = $model->getStudentTestAnswers($_GET["examId"],$_GET["studentId"]);
        $array = [];
        $header = array("exam_id", "user_id", "type", "answer");
        $array[] = $header;
        foreach ($data as $item) {
            if(!strcmp($item["type"],"Nakreslenie obrázka")) continue;

            if(!strcmp($item["answer"],"")) {
                $one =  array($_GET["examId"],$_GET["studentId"],$item["type"], $item["correct_answer"]);
            } else {
                $one =  array($_GET["examId"],$_GET["studentId"],$item["type"], $item["answer"]);
            }
            $array[] = $one;
        }

        foreach ($array as $line) {
            fputcsv($f, $line, $delimiter);
        }
    }

    array_to_csv_download(array(
        array(1,2,3,4), // this array is going to be the first row
        array(1,2,3,4)), // this array is going to be the second row
        "numbers.csv"
    );
}
