<?php

include "../app/vendor/autoload.php";

use App\Controller\Controller;

$controller = new Controller();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documentation</title>
    <link rel="stylesheet" href="assets/css/style.css">


    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit-icons.min.js"></script>


    <script defer src="assets/js/script.js"></script>
</head>
<body>
<main class="container">
    <div class="uk-text-center mt-3" uk-grid>
        <div class="uk-width-auto@m">
            <div class="uk-card uk-card-default "></div>
        </div>
        <div class="uk-width-expand@m">
            <div id="test" class="uk-card uk-card-default uk-card-body">
                <h1 ><i>Documentation</i></h1><br>
                <h3 >The last task</h3>
                <hr class="uk-divider-icon ">
                <h3 >Members in Team</h3>
                <div class="uk-child-width-1-2@s" uk-grid>
                    <div uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
                        <div class="uk-light uk-background-secondary uk-padding">
                            <h3>Michal Kaminský</h3>
                            <img class="thumbnail" src="img/miso.jpeg"  alt="Kaminský" />
                            <h4>Contact us:</h4>
                            <div class="uk-column-1-3@m">
                                <ul class="uk-list uk-list-divider">
                                    <li><a href="https://github.com/michalcik10" type="button" class="uk-button uk-button-default"><i uk-icon="icon: github"></i></a></li>
                                    <li><a href="mailto:xkaminsky@stuba.sk" type="button" class="uk-button uk-button-default"><i uk-icon="icon: mail"></i></a></li>
                                    <li><a href="https://www.facebook.com/michal.kaminsky.71" type="button" class="uk-button uk-button-default"><i uk-icon="icon: facebook"></i></a></li>
                                    <li></li>
                                </ul>
                            </div>
                            <h3>Description of Work</h3>
                            <hr class="uk-divider-icon ">
                            <p></p>
                        </div>
                    </div>
                    <div uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
                        <div class="uk-dark uk-background-muted uk-padding">
                            <h3>Lukáš Löbl</h3>
                            <img src="img/lukas.jpg" class="thumbnail" alt="Löbl" />
                            <h4>Contact us:</h4>
                            <div class="uk-column-1-3@m">
                                <ul class="uk-list uk-list-divider">
                                    <li><a href="https://github.com/luxao" type="button" class="uk-button uk-button-default" ><i uk-icon="icon: github"></i></a></li>
                                    <li><a href="mailto:xlobl@stuba.sk" type="button" class="uk-button uk-button-default"><i uk-icon="icon: mail"></i></a></li>
                                    <li><a href="https://www.facebook.com/Luxao.10/" type="button" class="uk-button uk-button-default"><i uk-icon="icon: facebook"></i></a></li>
                                    <li></li>
                                </ul>
                            </div>
                            <h3>Description of Work</h3>
                            <hr class="uk-divider-icon ">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="uk-child-width-1-2@s" uk-grid>
                   <div uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
                        <div class="uk-dark uk-background-muted uk-padding">
                            <h3>Roman Čech</h3>
                            <img src="img/ROMAN2.jpg" class="thumbnail" alt="Čech" />
                            <h4>Contact us:</h4>
                            <div class="uk-column-1-3@m">
                                <ul class="uk-list uk-list-divider">
                                    <li><a href="https://github.com/RomanCech" type="button" class="uk-button uk-button-default"><i uk-icon="icon: github"></i></a></li>
                                    <li><a href="mailto:xcech@stuba.sk" type="button" class="uk-button uk-button-default" ><i uk-icon="icon: mail"></i></a></li>
                                    <li><a href="https://www.facebook.com/roman.cech.587" type="button" class="uk-button uk-button-default"><i uk-icon="icon: facebook"></i></a></li>
                                    <li></li>
                                </ul>
                            </div>
                            <h3>Description of Work</h3>
                            <hr class="uk-divider-icon ">
                            <p></p>
                        </div>
                    </div>
                    <div uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
                        <div class="uk-light uk-background-secondary uk-padding">
                            <h3>Sebastián Ivan</h3>
                            <img src="img/sebastian.png" class="thumbnail" alt="Ivan" />
                            <h4>Contact us:</h4>
                            <div class=" uk-column-1-3@m ">
                                <ul class="uk-list uk-list-divider">
                                    <li><a href="#" type="button" class="uk-button uk-button-default"><i  uk-icon="icon: github"></i></a></li>
                                    <li><a href="mailto:xivans@stuba.sk"  type="button" class="uk-button uk-button-default"><i uk-icon="icon: mail"></i></a></li>
                                    <li><a href="https://www.facebook.com/sebastian.ivan.798" type="button" class="uk-button uk-button-default"><i uk-icon="icon: facebook"></i></a></li>
                                    <li></li>
                                </ul>
                            </div>
                            <h3>Description of Work</h3>
                            <hr class="uk-divider-icon ">
                            <p></p>
                        </div>
                    </div>
                </div>
                <hr class="uk-divider-icon ">
                <h3>Division of task</h3>
                <table class="uk-table uk-table-divider">
                    <thead>
                    <tr>
                        <th class="uk-table-shrink">Name & Surname</th>
                        <th class="uk-table-expand">Task</th>
                        <th class="uk-width-small">Points</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Michal Kaminský</td>
                        <td>prihlasovanie sa do aplikácie (študent, učiteľ)</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>Lukáš Löbl</td>
                        <td>realizácia otázok <bold>s viacerými odpoveďami</bold> (zadávanie, zobrazovanie, vyhodnotenie)</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Lukáš Löbl</td>
                        <td>realizácia otázok <bold>s krátkymi odpoveďami</bold> (zadávanie, zobrazovanie, vyhodnotenie)</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Roman Čech</td>
                        <td>realizácia párovacích otázok (zadávanie, zobrazovanie, vyhodnotenie)</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>Michal Kaminský</td>
                        <td>realizácia otázok <bold>s kreslením</bold> (zadávanie, zobrazovanie, vkladanie výsledku do test, vyhodnotenie)</td>
                        <td>15</td>
                    </tr>
                    <tr>
                        <td>Lukáš Löbl</td>
                        <td>realizácia otázok <bold>s matematickým výrazom</bold> (zadávanie, zobrazovanie, vkladanie výsledku do test, vyhodnotenie)</td>
                        <td>15</td>
                    </tr>
                    <tr>
                        <td>Sebastián Ivan</td>
                        <td>ukončenie testu (tlačidlo, čas)</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Lukáš Löbl</td>
                        <td>možnosť zadefinovania viacerých testov, ich aktivácia a deaktivácia</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Sebastián Ivan</td>
                        <td>info pre učiteľa ozbiehaní testov (kto už ukončil akto opustil danú stránku)</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Sebastián Ivan</td>
                        <td>export do pdf</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Sebastián Ivan</td>
                        <td>export do csv</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Roman Čech</td>
                        <td>docker balíček</td>
                        <td>16</td>
                    </tr>
                    <tr>
                        <td>Michal Kaminský + Roman Čech(prvotný návrh db)</td>
                        <td>finalizácia aplikácie, grafický layout, štruktúra, orientácia vaplikácii, voľba db tabuliek, úplnosť odovzdania projektu, ...</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>Sum</td>
                        <td></td>
                        <td>150</td>
                    </tr>
                    </tbody>
                </table>
                <hr>
                <h3>API</h3>
                <div class=" uk-column-1-3@m ">
                    <ul class="uk-list uk-list-divider">
                        <li><a href="https://mathlive.io/" type="button" class="uk-button uk-button-default">MathLive</a></li>
                        <li><a href="https://getbootstrap.com/"  type="button" class="uk-button uk-button-default">Bootstrap</a></li>
                        <li><a href="https://getuikit.com/" type="button" class="uk-button uk-button-default">Uikit</a></li>
                        <li></li>
                    </ul>
                </div>
                <div class=" uk-column-1-3@m ">
                    <ul class="uk-list uk-list-divider">
                        <li><a href="https://mathlive.io/" type="button" class="uk-button uk-button-default">?</a></li>
                        <li><a href="https://zwibbler.com/"  type="button" class="uk-button uk-button-default">Zwibbler</a></li>
                        <li><a href="https://getuikit.com/" type="button" class="uk-button uk-button-default">?</a></li>
                        <li></li>
                    </ul>
                </div>
                <a href="logs/logIn_Student.php" type="button" class="uk-button uk-margin-small-top">Back to Web aplication</a>
            </div>
        </div>
        <div class="uk-width-auto@m">
            <div class="uk-card uk-card-default "></div>
        </div>
    </div>
</main>
</body>
</html>