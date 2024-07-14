
function validationform(){
    const email= document.getElementById('email').value;
    const password=document.getElementById('password').value;
    const errormessag= document.getElementById('.text-danger');

    errormessag.textContent ='';

    if(email.trim() === ''){
        errormessag.textContent='Email Obbligatoria';
        return false;
    }

    if(password.trim() === ''){
        errormessag.textContent ='Password obbligatoria';
        return false;
    }

    return true;
}