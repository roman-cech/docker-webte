<?php

namespace App\Controller;



use App\Model\Model;


class Controller
{
    public function insertQuestion($exam_id,$question,$answerId,$type,$questionPoints){
        $model = new Model();
        $model->insertQuestions($exam_id,$question,$answerId,$type,$questionPoints);
    }


    public function insertAnswers($user_id,$questionId,$type,$answer,$correct_answer){
        $model = new Model();

        //get questionId

        $model->insertAnswers($user_id,$questionId,$type,$answer,$correct_answer);
    }


}