<?php

session_start();

use App\Model\GetQuestionModel;
use App\Model\GetAnswerModel;
use App\Model\LogsModel;
use App\Model\Model;
use App\Model\ExamsLoginModel;

include "../../app/vendor/autoload.php";

function getJsonDecode($res)
{
    $tmp = json_encode($res);
    return json_decode($tmp);
}

function getAnswerFromObject($answerObject) {

    $decodeObject = getJsonDecode($answerObject);
    if($decodeObject[0]->correct_answer == null ) {
        return $decodeObject[0]->answer;
    }

    return $decodeObject[0]->correct_answer;
}

if(isset($_POST['json'])) {

    $json = $_POST['json'];
    $shortFirst = $json["shortFirst"];
    $shortSecond = $json["shortSecond"];
    $choose1 = $json["choose1"];
    $choose2 = $json["choose2"];
    $firstMathField = $json["firstMathField"];
    $secondMathField = $json["secondMathField"];
    $draw = $json["draw"];
    $firstPair = $json["firstPair"];
    $secondPair = $json["secondPair"];
    $thirdPair = $json["thirdPair"];
    $fourthPair = $json["fourPair"];
    $changeTab = $json["changeTab"];

    $questionModel = new GetQuestionModel();
    $answerModel = new GetAnswerModel();
    $logsModel = new LogsModel();
    $model = new Model();
    $examLoginModel = new ExamsLoginModel();

    $resultExam = $questionModel->getExamId($_SESSION['examCode']);
    $exam = getJsonDecode($resultExam);

    $exam_id = $exam[0]->id;

    //get Short questions
    $shortQuestionObject = $questionModel->getShortQuestions($exam_id);
    $decodeShortQuestions = getJsonDecode($shortQuestionObject);

    //Short questions answers
    $shortFirstAnswer =  getAnswerFromObject($answerModel->getAnswerById($decodeShortQuestions[0]->answer_id));
    $shortSecondAnswer = getAnswerFromObject($answerModel->getAnswerById($decodeShortQuestions[1]->answer_id));

    //******************

    //get choose question
    $chooseQuestionObject = $questionModel->getChooseQuestions($exam_id);
    $decodeChooseQuestions = getJsonDecode($chooseQuestionObject);

    //Choose questions answers
    $firstChooseAnswer = getAnswerFromObject($answerModel->getAnswerById($decodeChooseQuestions[0]->answer_id));
    $secondChooseAnswer = getAnswerFromObject($answerModel->getAnswerById($decodeChooseQuestions[1]->answer_id));

    //******************

    //get math question
    $mathQuestionObject = $questionModel->getMathQuestions($exam_id);
    $decodeMathQuestions = getJsonDecode($mathQuestionObject);

    //Math questions answers
    $firstMathAnswer = getAnswerFromObject($answerModel->getAnswerById($decodeMathQuestions[0]->answer_id));
    $secondMathAnswer = getAnswerFromObject($answerModel->getAnswerById($decodeMathQuestions[1]->answer_id));

    //******************

    //get draw question
    $drawQuestionObject = $questionModel->getDrawThing($exam_id);
    $decodeDrawQuestion = getJsonDecode($drawQuestionObject);

    //******************

    //get pair questions
    $pairQuestionObject = $questionModel->getPairQuestions($exam_id);
    $decodePairQuestion = getJsonDecode($pairQuestionObject);

    //get pair question answers
    $firstPairAnswer = getAnswerFromObject($questionModel->getPairAnswers($decodePairQuestion[1]->answer_id));
    $secondPairAnswer = getAnswerFromObject($questionModel->getPairAnswers($decodePairQuestion[3]->answer_id));
    $thirdPairAnswer = getAnswerFromObject($questionModel->getPairAnswers($decodePairQuestion[0]->answer_id));
    $fourthPairAnswer = getAnswerFromObject($questionModel->getPairAnswers($decodePairQuestion[2]->answer_id));

    /* NOW INSERT ANSWERS TO DB */

    $studentObject = $logsModel->selectStudent($_SESSION['aisId']);
    $decodeStudent = getJsonDecode($studentObject);
    $studentId = $decodeStudent[0]->id;

    //TODO check update
    // update student status - exam finished
    $examLoginModel->updateWritingStudentStat($exam_id, $studentId, 1, $changeTab);

    $model->insertAnswers($studentId, $decodeShortQuestions[0]->id, $decodeShortQuestions[0]->type,$shortFirst,null);
    $model->insertAnswers($studentId, $decodeShortQuestions[1]->id, $decodeShortQuestions[1]->type,$shortSecond,null);

    $model->insertAnswers($studentId, $decodeChooseQuestions[0]->id, $decodeChooseQuestions[0]->type,"", $choose1);
    $model->insertAnswers($studentId, $decodeChooseQuestions[1]->id, $decodeChooseQuestions[1]->type,"", $choose2);

    $model->insertAnswers($studentId, $decodeMathQuestions[0]->id, $decodeMathQuestions[0]->type, $firstMathField, null);
    $model->insertAnswers($studentId, $decodeMathQuestions[1]->id, $decodeMathQuestions[1]->type, $secondMathField, null);

    $model->insertAnswers($studentId, $decodeDrawQuestion[0]->id, $decodeDrawQuestion[0]->type, $draw, null);

    $model->insertAnswers($studentId, $decodePairQuestion[1]->id, $decodePairQuestion[1]->type, $firstPair, null);
    $model->insertAnswers($studentId, $decodePairQuestion[3]->id, $decodePairQuestion[3]->type, $secondPair, null);
    $model->insertAnswers($studentId, $decodePairQuestion[0]->id, $decodePairQuestion[0]->type, $thirdPair, null);
    $model->insertAnswers($studentId, $decodePairQuestion[2]->id, $decodePairQuestion[2]->type, $fourthPair, null);

    /* NOW COMPARE ANSWERS AND ADD POINTS */

    $all_points = 0;
    $question1_points = 0;
    $question2_points = 0;
    $question3_points = 0;
    $question4_points = 0;
    $question5_points = 0;
    $question6_points = 0;
    $question7_points = 0;
    $question8_points = 0;
    $question9_points = 0;
    $question10_points = 0;
    $question11_points = 0;

    if(!strcmp($shortFirstAnswer,$shortFirst)) $question1_points = $decodeShortQuestions[0]->question_points;
    if(!strcmp($shortSecondAnswer,$shortSecond)) $question2_points = $decodeShortQuestions[1]->question_points;

    if(!strcmp($firstChooseAnswer,$choose1)) $question3_points = $decodeChooseQuestions[0]->question_points;
    if(!strcmp($secondChooseAnswer,$choose2)) $question4_points = $decodeChooseQuestions[1]->question_points;

    if(!strcmp($firstMathAnswer,$firstMathField)) $question5_points = $decodeMathQuestions[0]->question_points;
    if(!strcmp($secondMathAnswer,$secondMathField)) $question6_points = $decodeMathQuestions[1]->question_points;

    //7 sa netestuje lebo to je obrazok

    if(!strcmp($firstPairAnswer,$firstPair)) $question8_points = $decodePairQuestion[1]->question_points;
    if(!strcmp($secondPairAnswer,$secondPair)) $question9_points = $decodePairQuestion[3]->question_points;
    if(!strcmp($thirdPairAnswer,$thirdPair)) $question10_points = $decodePairQuestion[0]->question_points;
    if(!strcmp($fourthPairAnswer,$fourthPair)) $question11_points = $decodePairQuestion[2]->question_points;

    $all_points += $question1_points + $question2_points + $question3_points +  $question4_points + $question5_points + $question6_points;
    $all_points += $question7_points + $question8_points + $question9_points + $question10_points + $question11_points;

    $model->insertPoints($exam_id,$studentId,$question1_points,$question2_points,$question3_points,$question4_points,$question5_points,$question6_points,$question7_points,$question8_points,$question9_points,$question10_points,$question11_points,$all_points);

    echo "successfull";
}