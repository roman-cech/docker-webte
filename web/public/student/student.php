<?php

session_start();

include "../../app/vendor/autoload.php";

use App\Controller\GetQuestionController;
use App\Model\GetQuestionModel;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function getJsonDecode($res)
{
    $tmp = json_encode($res);
    return json_decode($tmp);
}

?>


<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Student</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-Lidth, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/44b171361e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- --------------------- -->
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/css/uikit.min.css"/>

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit-icons.min.js"></script>


    <script src="https://zwibbler.com/zwibbler-demo.js"></script>

    <link rel="stylesheet" href="../assets/css">

    <script src='https://unpkg.com/mathlive/dist/mathlive.min.js'></script>
</head>
<style>
    label {
        font-size: 1.5em;
    }
</style>

<body>
<div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; top: 200">
    <nav class="uk-navbar-container" uk-navbar="dropbar: true;" style="position: relative; z-index: 980;">
        <div class="uk-navbar-center">

            <ul class="uk-navbar-nav">
                <li><a href="#" class="uk-button">CLOCKS</a></li>
            </ul>

        </div>
        <div class="uk-navbar-right">

            <ul class="uk-navbar-nav">
                <li><a href="#" type="button" class="uk-button">Send Test</a></li>
            </ul>

        </div>
    </nav>
</div>
<div class="container">
    <div class="exam-paper"
         style="width: 60em; height: 120em;border: 2px solid #444; box-shadow: 5px 5px 5px #555; margin: 2em auto; text-align: center;background-color: #fff">
        <?php

        $model = new GetQuestionModel();
        $controller = new GetQuestionController();

        $resultExamID = $model->getExamId($_SESSION['examCode']);
        $examID = getJsonDecode($resultExamID);

        echo "<h2> Exam :  " . $examID[0]->title . "</h2>";

        $exam_id = $examID[0]->id;
        //get Short questions
        $resShort = $model->getShortQuestions($exam_id);
        $shortQ = getJsonDecode($resShort);

        //tmp for num questions
        $tmp = 1;

        //get choose right answer questions
        $resChoose = $model->getChooseQuestions($exam_id);
        $chooseQ = getJsonDecode($resChoose);


        //get choose right answers for first
        $firstChooseAnswers = $model->getChooseAnswers($chooseQ[0]->answer_id);

        $objFirstAnswers = getJsonDecode($firstChooseAnswers);
        $arrFirstAnswers = explode(",", $objFirstAnswers[0]->answer);

        //get choose right answers for second
        $secondChooseAnswers = $model->getChooseAnswers($chooseQ[1]->answer_id);
        $objSecondAnswers = getJsonDecode($secondChooseAnswers);
        $arrSecondAnswers = explode(",", $objSecondAnswers[0]->answer);


        //get math questions
        $tmpMathQuestion = $model->getMathQuestions($exam_id);
        $mathQuestion = getJsonDecode($tmpMathQuestion);

        //get PairQuestion
        $tmpPairQuestion = $model->getPairQuestions($exam_id);
        $pairQuestion = getJsonDecode($tmpPairQuestion);


        $tmpFirstPairAnswer = $model->getPairAnswers($pairQuestion[0]->answer_id);
        $firstPairAnswer = getJsonDecode($tmpFirstPairAnswer);

        $tmpSecondPairAnswer = $model->getPairAnswers($pairQuestion[1]->answer_id);
        $secondPairAnswer = getJsonDecode($tmpSecondPairAnswer);

        $tmpThirdPairAnswer = $model->getPairAnswers($pairQuestion[2]->answer_id);
        $thirdPairAnswer = getJsonDecode($tmpThirdPairAnswer);

        $tmpFourPairAnswer = $model->getPairAnswers($pairQuestion[3]->answer_id);
        $fourPairAnswer = getJsonDecode($tmpFourPairAnswer);

        //TODO: vytvorit funkcionality pre matematické vzorce, kontrolovanie správnosti odpovedi,
        //TODO: vytvorit funkcionalitu pre párovacie otázky
        //TODO: kreslenie pre kresliacu otázku

        ?>

        <div class="mb-3">
            <label for="short-first"><?php echo "(" . $tmp++ . ". Uloha\t):\t" . $shortQ[0]->question ?></label>
            <br>
            <strong>Odpoveď: </strong> <input type="number" name="short-first" id="short-first">
            <br>
        </div>
        <br>
        <div class="mb-3">
            <label for="short-second"><?php echo "(" . $tmp++ . ". Uloha\t):\t" . $shortQ[1]->question ?></label>
            <br>
            <strong>Odpoveď: </strong> <input type="number" name="short-second" id="short-second">
            <br>
        </div>
        <div class="mb-3">
            <label for="choose-first"><?php echo "(" . $tmp++ . ". Uloha\t):\t" . $chooseQ[0]->question ?></label>
            <br>
            <label for="first-choose-answer"><?php echo $arrFirstAnswers[0] ?></label>
            <input type="checkbox" name="first-choose-answer" id="first-choose-answer">
            <br>
            <label for="second-choose-answer"><?php echo $arrFirstAnswers[1] ?></label>
            <input type="checkbox" name="second-choose-answer" id="second-choose-answer">
            <br>
            <label for="third-choose-answer"><?php echo $arrFirstAnswers[2] ?></label>
            <input type="checkbox" name="third-choose-answer" id="third-choose-answer">
            <br>
        </div>
        <div class="mb-3">
            <label for="choose-first"><?php echo "(" . $tmp++ . ". Uloha\t):\t" . $chooseQ[1]->question ?></label>
            <br>
            <label for="first-choose-answer"><?php echo $arrSecondAnswers[0] ?></label>
            <input type="checkbox" name="first-choose-answer" id="first-choose-answer">
            <br>
            <label for="second-choose-answer"><?php echo $arrSecondAnswers[1] ?></label>
            <input type="checkbox" name="second-choose-answer" id="second-choose-answer">
            <br>
            <label for="third-choose-answer"><?php echo $arrSecondAnswers[2] ?></label>
            <input type="checkbox" name="third-choose-answer" id="third-choose-answer">
            <br>
        </div>

        <div class="mb-3">
            <br>
            <br>
            <strong style="font-size: 1.5em;"><?php echo "(" . $tmp++ . ". Uloha\t):\t" . $mathQuestion[0]->question ?></strong>
            <div id="first-mathfield" style="
                            font-size: 32px;
                            margin: 3em;
                            padding: 8px;
                            border-radius: 8px;
                            border: 1px solid rgba(0, 0, 0, .3);
                            box-shadow: 0 0 8px rgba(0, 0, 0, .2);
                        ">f(x)
            </div>
    </div>

    <div class="mb-4">
        <strong style="font-size: 1.5em;"><?php echo "(" . $tmp++ . ". Uloha\t):\t" . $mathQuestion[1]->question ?></strong>
        <div id="second-mathfield" style="
                            font-size: 32px;
                            margin: 3em;
                            padding: 8px;
                            border-radius: 8px;
                            border: 1px solid rgba(0, 0, 0, .3);
                            box-shadow: 0 0 8px rgba(0, 0, 0, .2);
                        ">x=\frac{-b\pm \sqrt{b^2-4ac}}{2a}
        </div>
    </div>


    <div>

        <zwibbler z-controller="mycontroller">
            <button z-click="ctx.newDocument()">New</button>
            <button z-click="mySave()">Save</button>
            <button z-click="myOpen()">Open</button>
            <div z-canvas style="height:300px"></div>
        </zwibbler>


    </div>

    <button type="submit" class="btn btn-success m-3">Odoslať</button>
    <div class="mb-3">
        <br>
        <h4><strong style="font-size: 1.5em"><?php echo "(" . $tmp++ . ". Uloha\t): " ?> Párovacie otázky</strong></h4>
        <div class="m-3" style="float: left">
            <strong style="font-size: 1.5em; display: block">A) - <?php echo $pairQuestion[1]->question ?></strong>

                <strong style="font-size: 1.5em; display: block ">B) - <?php echo  $pairQuestion[3]->question ?></strong>

                <strong style="font-size: 1.5em;display: block">C) - <?php echo  $pairQuestion[0]->question ?></strong>

                <strong style="font-size: 1.5em;display: block">D) - <?php echo  $pairQuestion[2]->question ?></strong>

            </div>

            <div class="m-3" style="float: right">
                <input type="text" id="first-pair-input" style ="width:3em"> <strong style="font-size: 1.5em;"><?php echo  $fourPairAnswer[0]->answer ?></strong><br>
                <input type="text" id="second-pair-input" style ="width:3em"> <strong style="font-size: 1.5em;"><?php echo  $secondPairAnswer[0]->answer ?></strong><br>
                <input type="text" id="third-pair-input"style ="width:3em"> <strong style="font-size: 1.5em;"><?php echo  $thirdPairAnswer[0]->answer ?></strong><br>
                <input type="text" id="four-pair-input" style ="width:3em"><strong style="font-size: 1.5em;"><?php echo  $firstPairAnswer[0]->answer ?></strong><br>
            </div>
        </div>



    </div>

    <button name="logout"><a href="../logs/Logout.php">Logout</a></button>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
<script>


    Zwibbler.controller("mycontroller", (scope) => {
        let saved = "";
        const ctx = scope.ctx;
        scope.mySave = () => {
            saved = ctx.save("svg");
            alert("Saved: " + saved);
            console.log(saved);
        }

        scope.myOpen = () => {
            if (!saved) {
                alert("Please save first.");
                return;
            }

            ctx.load(saved);
        }
    })

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="../assets/js/Jquery.js"></script>
<script>


    const HIGH_SCHOOL_KEYBOARD_LAYER = {
        "high-school-layer": {
            styles: "",
            rows: [
                [
                    {latex: "a"},
                    {latex: "x"},
                    {class: "separator w5"},
                    {label: "7", key: "7"},
                    // Will display the label using the system font. To display
                    // with the TeX font, use:
                    // { class: "tex", label: "7", key: "7" },
                    // or
                    // { latex: "7"},
                    {label: "8", key: "8"},
                    {label: "9", key: "9"},
                    {latex: "\\div"},
                    {class: "separator w5"},
                    {
                        class: "tex small",
                        label: "<span><i>x</i>&thinsp;²</span>",
                        insert: "$$#@^{2}$$"
                    },
                    {
                        class: "tex small",
                        label: "<span><i>x</i><sup>&thinsp;<i>n</i></sup></span>",
                        insert: "$$#@^{}$$"
                    },
                    {
                        class: "small",
                        latex: "\\sqrt{#0}",
                        insert: "$$\\sqrt{#0}$$",
                    }
                ],
                [
                    {class: "tex", latex: "b"},
                    {class: "tex", latex: "y"},
                    {class: "separator w5"},
                    {label: "4", latex: "4"},
                    {label: "5", key: "5"},
                    {label: "6", key: "6"},
                    {latex: "\\times"},
                    {class: "separator w5"},
                    {class: "small", latex: "\\frac{#0}{#0}"},
                    {class: "separator"},
                    {class: "separator"}
                ],
                [
                    {class: "tex", label: "<i>c</i>"},
                    {class: "tex", label: "<i>z</i>"},
                    {class: "separator w5"},
                    {label: "1", key: "1"},
                    {label: "2", key: "2"},
                    {label: "3", key: "3"},
                    {latex: "-"},
                    {class: "separator w5"},
                    {class: "separator"},
                    {class: "separator"},
                    {class: "separator"}
                ],
                [
                    {latex: "("},
                    {latex: ")"},

                    {class: "separator w5"},
                    {label: "0", key: "0"},
                    {latex: "."},
                    {latex: "\\pi"},
                    {latex: "+"},
                    {class: "separator w5"},
                    {
                        class: "action",
                        label: "<svg><use xlink:href='#svg-arrow-left' /></svg>",
                        command: ["performWithFeedback", "moveToPreviousChar"]
                    },
                    {
                        class: "action",
                        label: "<svg><use xlink:href='#svg-arrow-right' /></svg>",
                        command: ["performWithFeedback", "moveToNextChar"]
                    },
                    {
                        class: "action font-glyph bottom right",
                        label: "&#x232b;",
                        command: ["performWithFeedback", "deleteBackward"]
                    }
                ]
            ]
        }
    };

    const HIGH_SCHOOL_KEYBOARD = {
        "high-school-keyboard": {
            "label": "High School", // Label displayed in the Virtual Keyboard Switcher
            "tooltip": "High School Level", // Tooltip when hovering over the label
            "layer": "high-school-layer"
        }
    };

    MathLive.makeMathField(document.getElementById('first-mathfield'), {
        virtualKeyboardMode: "manual",
        virtualKeyboardToggleGlyph: `<span style="width: 21px;"><svg style="width: 21px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M192 288H32c-18 0-32 14-32 32v160c0 18 14 32 32 32h160c18 0 32-14 32-32V320c0-18-14-32-32-32zm-29 140c3 3 3 8 0 12l-11 11c-4 3-9 3-12 0l-28-28-28 28c-3 3-8 3-12 0l-11-11c-3-4-3-9 0-12l28-28-28-28c-3-3-3-8 0-12l11-11c4-3 9-3 12 0l28 28 28-28c3-3 8-3 12 0l11 11c3 4 3 9 0 12l-28 28 28 28zM480 0H320c-18 0-32 14-32 32v160c0 18 14 32 32 32h160c18 0 32-14 32-32V32c0-18-14-32-32-32zm-16 120c0 4-4 8-8 8h-40v40c0 4-4 8-8 8h-16c-4 0-8-4-8-8v-40h-40c-4 0-8-4-8-8v-16c0-4 4-8 8-8h40V56c0-4 4-8 8-8h16c4 0 8 4 8 8v40h40c4 0 8 4 8 8v16zm16 168H320c-18 0-32 14-32 32v160c0 18 14 32 32 32h160c18 0 32-14 32-32V320c0-18-14-32-32-32zm-16 152c0 4-4 8-8 8H344c-4 0-8-4-8-8v-16c0-4 4-8 8-8h112c4 0 8 4 8 8v16zm0-64c0 4-4 8-8 8H344c-4 0-8-4-8-8v-16c0-4 4-8 8-8h112c4 0 8 4 8 8v16zM192 0H32C14 0 0 14 0 32v160c0 18 14 32 32 32h160c18 0 32-14 32-32V32c0-18-14-32-32-32zm-16 120c0 4-4 8-8 8H56c-4 0-8-4-8-8v-16c0-4 4-8 8-8h112c4 0 8 4 8 8v16z"/></svg></span>`
    });


    MathLive.makeMathField(document.getElementById('second-mathfield'), {
        virtualKeyboardMode: "manual",
        virtualKeyboardToggleGlyph: `<span style="width: 21px;"><svg style="width: 21px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M192 288H32c-18 0-32 14-32 32v160c0 18 14 32 32 32h160c18 0 32-14 32-32V320c0-18-14-32-32-32zm-29 140c3 3 3 8 0 12l-11 11c-4 3-9 3-12 0l-28-28-28 28c-3 3-8 3-12 0l-11-11c-3-4-3-9 0-12l28-28-28-28c-3-3-3-8 0-12l11-11c4-3 9-3 12 0l28 28 28-28c3-3 8-3 12 0l11 11c3 4 3 9 0 12l-28 28 28 28zM480 0H320c-18 0-32 14-32 32v160c0 18 14 32 32 32h160c18 0 32-14 32-32V32c0-18-14-32-32-32zm-16 120c0 4-4 8-8 8h-40v40c0 4-4 8-8 8h-16c-4 0-8-4-8-8v-40h-40c-4 0-8-4-8-8v-16c0-4 4-8 8-8h40V56c0-4 4-8 8-8h16c4 0 8 4 8 8v40h40c4 0 8 4 8 8v16zm16 168H320c-18 0-32 14-32 32v160c0 18 14 32 32 32h160c18 0 32-14 32-32V320c0-18-14-32-32-32zm-16 152c0 4-4 8-8 8H344c-4 0-8-4-8-8v-16c0-4 4-8 8-8h112c4 0 8 4 8 8v16zm0-64c0 4-4 8-8 8H344c-4 0-8-4-8-8v-16c0-4 4-8 8-8h112c4 0 8 4 8 8v16zM192 0H32C14 0 0 14 0 32v160c0 18 14 32 32 32h160c18 0 32-14 32-32V32c0-18-14-32-32-32zm-16 120c0 4-4 8-8 8H56c-4 0-8-4-8-8v-16c0-4 4-8 8-8h112c4 0 8 4 8 8v16z"/></svg></span>`
    });
</script>


</body>
</html>

