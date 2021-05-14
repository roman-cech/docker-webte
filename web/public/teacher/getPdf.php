<?php


include "../../app/vendor/autoload.php";

include "../../app/vendor/dompdf/autoload.inc.php";
use App\Model\Model;

use Dompdf\Dompdf;

if(isset($_GET["examId"]) && isset($_GET["studentId"])) {

    function getPdfStudentTest(){
        $model = new Model();
        $data = $model->getStudentTestAnswers($_GET["examId"],$_GET["studentId"]);

        $testTitle = $model->getTitleExam($_GET['examId']);

        $studentInfo = $model->getStudent($_GET['studentId']);

        $student = json_decode(json_encode($studentInfo));
        $title = json_decode(json_encode($testTitle));

        ob_start();
        $json = json_encode($data,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $json_decoded= json_decode($json);


        $tmp = 1;
        foreach ($json_decoded as $value){
                $hot .= "<tr><td>".$value->question."</td><td>".$value->type."</td><td>".$value->answer."</td></tr>";

        }

        echo $hot;


            $html =  '
          <!DOCTYPE html>
          <html>
          <head>
              <title>Výsledky testu</title>         
              <meta  charset="UTF-8">
              <link href="../assets/css/style.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/css/uikit.min.css"/>       
            <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit-icons.min.js"></script>
          </head>
          <body >
          <h1>'.$title[0]->title.'</h1>
           <hr class="uk-divider-icon "> 
          <h2>'.$student[0]->name. '  ' . $student[0]->surname. ' </h2>
              <table class="uk-table uk-table-divider">
                  <tr>
                      <th>Otázka '. $tmp++ .'</th>
                      <th>Typ otázky</th>
                      <th>Odpoveď</th>
                  </tr>
                   '..'
        </table>
          </body>
           </html>';






//
//
//                $dompdf = new Dompdf();
//                $dompdf->loadHtml($html);
//
//                $dompdf->setPaper('A4', 'landscape');
//
//                $dompdf->render();
//
//                $dompdf->stream();

    }
//
//    getPdfStudentTest();
}
