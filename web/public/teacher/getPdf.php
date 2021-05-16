<?php

use App\Model\Model;

use Dompdf\Dompdf;

include "../../app/vendor/autoload.php";

if(isset($_GET["examId"]) && isset($_GET["studentId"])) {

    function getPdfStudentTest(){
        $model = new Model();

        $data = $model->getStudentTestAnswers($_GET["examId"],$_GET["studentId"]);

        $testTitle = $model->getTitleExam($_GET['examId']);

        $studentInfo = $model->getStudent($_GET['studentId']);

        $student = json_decode(json_encode($studentInfo),false, 512, JSON_UNESCAPED_UNICODE);
        $title = json_decode(json_encode($testTitle),false, 512, JSON_UNESCAPED_UNICODE);

        ob_start();
        $json = json_encode(mb_convert_encoding($data,"UTF-8"));
        $model->headers();

        $json_decoded= json_decode($json);


        $tableValeus = "";
        foreach ($json_decoded as $value) {
            if($value->type === "Nakreslenie obrázka"){
                $tableValeus.= "<tr><td>$value->question</td>
                                <td>$value->type</td>
               <td><img src= '$value->answer.png' width='300' height='150'></td></tr>
             " ;
            }
            $tableValeus .=
            '<tr>
            <td>'.$value->question.'</td>
            <td>'.$value->type.'</td>            
            <td>'.$value->answer.'</td>
            </tr>';
        }

            $html =  '
          <!DOCTYPE html>
          <html>
          <head>
              <title>Výsledky testu</title>
              <meta  http-equiv="Content-Type" content="text/html; charset=utf-8"/>
              <link href="../assets/css/style.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/css/uikit.min.css"/>
            <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit-icons.min.js"></script>
          </head>
          <body>
          <h1>'.$title[0]->title.'</h1>
           <hr class="uk-divider-icon ">
          <h2>'.$student[0]->name. '  ' . $student[0]->surname. ' </h2>
              <table class="uk-table uk-table-divider">
                  <tr>
                      <th>Otázka</th>
                      <th>Typ otázky</th>
                      <th>Odpoveď              
                  </tr>
                  <tbody>'.$tableValeus.'       
                </tbody>
                </table>
                </body>
            </html>';


                $dompdf = new Dompdf();
                $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
                $dompdf->loadHtml($html,'UTF-8');
                $dompdf->setPaper('A4', 'landscape');

                $dompdf->render();

                $dompdf->stream();

    }

    getPdfStudentTest();
}
