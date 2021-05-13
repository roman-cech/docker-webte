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

