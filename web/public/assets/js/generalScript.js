function validate()
{
    var name = document.getElementById('name').value
    var surname = document.getElementById('surname').value

    if(name === '' || name == null){
        document.getElementById('name').className = 'uk-input uk-form-danger';
        return false
    }
    if(name !== ''){
        document.getElementById('name').className = 'uk-input uk-form-success';
    }
    if(surname === '' ||surname == null){
        document.getElementById('surname').className= 'uk-input uk-form-danger';
        return false
    }
    if(surname !== ''){
        document.getElementById('surname').className= 'uk-input uk-form-success';
    }
}

function studentValidate()
{
    var code = document.getElementById('code').value
    var aisId = document.getElementById('aisId').value
    validate();


    if(code === '' || code == null){
        document.getElementById('code').className = 'uk-input uk-form-danger';
        return false
    }
    if(code !== ''){
        document.getElementById('code').className = 'uk-input uk-form-success';
    }
    if(aisId === '' ||aisId == null){
        document.getElementById('aisId').className= 'uk-input uk-form-danger';
        return false
    }
    if(aisId !== ''){
        document.getElementById('aisId').className= 'uk-input uk-form-success';
    }

}
function teacherValidate(){

    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var re = /^([A-Za-z0-9_\-\.]){3,}\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;


    if(!re.test(email)){
        document.getElementById('email').className='uk-input uk-form-danger';
        return false
    }
    if(re.test(email) === true){
        document.getElementById('email').className='uk-input uk-form-success';
    }
    if(password === '' ||password == null){
        document.getElementById('password').className= 'uk-input uk-form-danger';
        return false
    }
    if(password !== ''){
        document.getElementById('password').className= 'uk-input uk-form-success';
    }
}
function teacherLogInValidate(){
    teacherValidate();
}
function teacherRegistrationValidate(){
    validate();
    teacherValidate();
}

var changeTab = 0;

function getPairInpput(i) {
    if(i == 1) {
        return  document.getElementById("first-pair").innerHTML;
    } else if(i == 2) {
        return document.getElementById("second-pair").innerHTML;
    } else if(i == 3) {
        return document.getElementById("third-pair").innerHTML;
    } else if(i == 4) {
        return document.getElementById("fourth-pair").innerHTML;
    } else return "ani jedna";
}

function kokos() {

    var link = document.getElementById('draw-save-button');
    link.click();

    var draw = document.getElementById("draw-input").value;

    var shortFirst = document.getElementById("short-first").value;

    var shortSecond = document.getElementById("short-second").value;

    var choose1 = "";
    if(document.getElementById("first-multi-first-checkbox").checked) {
        choose1 = document.getElementById("first-multi-first-answer").innerHTML;

    } else if(document.getElementById("first-multi-second-checkbox").checked) {
        choose1 = document.getElementById("first-multi-second-answer").innerHTML;

    } else if(document.getElementById("first-multi-third-checkbox").checked) {
        choose1 = document.getElementById("first-multi-third-answer").innerHTML;
    }

    var choose2 = "";
    if(document.getElementById("second-multi-first-checkbox").checked) {
        choose2 = document.getElementById("second-multi-first-answer").innerHTML;

    } else if(document.getElementById("second-multi-second-checkbox").checked) {
        choose2 = document.getElementById("second-multi-second-answer").innerHTML;

    } else if(document.getElementById("second-multi-third-checkbox").checked) {
        choose2 = document.getElementById("second-multi-third-answer").innerHTML;
    }

    var firstMathField = document.getElementById("first-mathfield").innerText;
    var length1 = firstMathField.length / 2;
    firstMathField = firstMathField.substring(0, length1);

    var secondMathField = document.getElementById("second-mathfield").innerText;
    var length2 = secondMathField.length / 2;
    secondMathField = secondMathField.substring(0, length2);

    var firstPair = document.getElementById("first-pair-input").value;
    firstPair = getPairInpput(firstPair);

    var secondPair = document.getElementById("second-pair-input").value;
    secondPair = getPairInpput(secondPair);

    var thirdPair = document.getElementById("third-pair-input").value;
    thirdPair = getPairInpput(thirdPair);

    var fourPair = document.getElementById("four-pair-input").value;
    fourPair = getPairInpput(fourPair);

    var json = {
        "shortFirst" : shortFirst,
        "shortSecond" : shortSecond,
        "choose1" : choose1,
        "choose2" : choose2,
        "firstMathField" : firstMathField,
        "secondMathField" : secondMathField,
        "draw" : draw,
        "firstPair" : firstPair,
        "secondPair" : secondPair,
        "thirdPair" : thirdPair,
        "fourPair" : fourPair,
        "changeTab" : changeTab
    }

    $.ajax({
        type : "POST",
        url  : "/student/postTest.php",
        data : { json : json },
        success: function(res){
            if(res == "successfull") {
                window.location.href="/logs/logout.php";
            }
        }
    });
}

Zwibbler.controller("mycontroller", (scope) => {
    let saved = "";
    const ctx = scope.ctx;
    scope.mySave = () => {
        saved = ctx.save("svg");
        //alert("Saved: " + saved);
        //TODO: V premennej saved sa nachadza link tohoto obrazku to treba ulozit do atributu aby to vedel potom ucitel nacitat
        ///console.log(saved);
        document.getElementById("draw-input").value = saved;
    }

    scope.myOpen = () => {
        if (!saved) {
            alert("Please save first.");
            return;
        }

        ctx.load(saved);
    }
})

//check if leave tab
const onVisibilityChange = () => {
    changeTab = 1;
}
document.addEventListener("visibilitychange", onVisibilityChange);

//timer
function msToTime(s) {
    var ms = s % 1000;
    s = (s - ms) / 1000;
    var secs = s % 60;
    s = (s - secs) / 60;
    var mins = s % 60;
    var hrs = (s - mins) / 60;

    return hrs + ':' + mins + ':' + secs + '.' + ms;
}

document.addEventListener("DOMContentLoaded", function(){
    var miliseconds = document.getElementById("exam-miliseconds").value;
    var myVar = setInterval(myTimer, miliseconds);

    //send exam after exam time limit
    function myTimer() {
        var link = document.getElementById('send-test-link');
        link.click();
    }

    //refresh clock until exam time limit
    var myVar2 = setInterval(myTimer2, 1000);
    function myTimer2() {
        miliseconds -= 1000;
        document.getElementById("clocks").innerHTML = msToTime(miliseconds);
    }
});
