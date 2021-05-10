<?php

namespace App\Controller;



class GetQuestionController {

    public  function displayShortQuestions($num,$question): string
    {
        return  "
                    <div>
                       <h3> $num. Otázka: $question ?</h3><br>
                        <input type='text' name='inputAnswer$num' id='inputAnswer$num'>
                        
                    </div>
                ";

    }

    public  function displayQuestions($num,$question): string
    {
        return  "
                    <div>
                       <h3> $num. Otázka: $question ?</h3><br>
                     
                    </div>
                ";

    }

    public  function displayPairQuestion($question,$answer): string
    {
        return  "
                    <div>
                       <strong>$question </strong>   <strong>$answer</strong>
                    
                    </div>
                ";

    }

    public  function displayChooseAnswers($num,$answer): string
    {
        return  "
                    <div>
                       <label for='chooseAnswer$num'>$answer</label>
                        <input type='checkbox' name='chooseAnswer$num' id='chooseAnswer$num'>
                    
                   </div>
                ";

    }

    public  function draw($num,$draw): string
    {
        return  "
                    <div>
                    <strong>Uloha $num</strong>
                        <h4>$draw</h4>
                   </div>
                ";

    }

    public  function displayAnswers($answer): string
    {
        return  "
                    <div>
                       <h5>$answer</h5>
                   </div>
                ";

    }

}