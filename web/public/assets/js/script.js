function isValid(){
    var userName = document.getElementById('name').value
    var surName = document.getElementById('surname').value
    var userDOB = document.getElementById('dateId').value
    var userAge = document.getElementById('age').value
    var userEmail = document.getElementById('email').value
    var re = /^([A-Za-z0-9_\-\.]){3,}\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    var yearPart = userDOB.split('.')
    var birthYear = parseInt(yearPart[0])
    var yearNow = new Date().getFullYear()

    var ageResult = yearNow - birthYear

    var messages = []
    if(userName === '' || userName == null){
        messages.push('ProsĂ­m vyplĹte poloĹľku s menom !')
        document.getElementById('error').innerText = messages.join(',')
        return false
    }
    if(userName !== ''){
        document.getElementById('error').innerText = null
        document.getElementById('name').style.backgroundColor = "lightgreen";
        document.getElementById('name').style.border = "3px solid green";
        document.getElementById('name').style.opacity = "0.9";
    }
    if(surName === '' ||surName == null){
        messages.push('ProsĂ­m vyplĹte poloĹľku s priezviskom !')
        document.getElementById('error2').innerText = messages.join(',')
        return false
    }
    if(surName !== ''){
        document.getElementById('error2').innerText = null
        document.getElementById('surname').style.backgroundColor = 'lightgreen';
        document.getElementById('surname').style.border = "3px solid green";
        document.getElementById('surname').style.opacity = "0.9";
    }

    if(!re.test(userEmail)){
        messages.push('Zadajte validnĂ˝ email !')
        document.getElementById('error5').innerText = messages.join(',')
        return false
    }
    if(re.test(userEmail) === true){
        document.getElementById('error5').innerText = null
        document.getElementById('email').style.border = "3px solid green";
        document.getElementById('email').style.opacity = "0.9"
    }

}