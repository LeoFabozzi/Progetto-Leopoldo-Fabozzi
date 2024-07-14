function validationform(){
    const email = document.getElementById('email').value;
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const Confirmpassword = document.getElementById('Confirmpassword').value;
    const errormessage=document.querySelector('.text-danger');

    errormessage.textContent='';

    //controllo se i campi sono vuoti

    if(email.trim() === ''){
        errormessage.textContent= 'Email Obbligatoria';
        return false;
    }

    //Regex per validare l'email
    const emailRegex=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRegex.test(email)){
        errormessage.textContent = 'Inserisci un email valida';
        return false;
    }

    if(username.trim() === ''){
        errormessage.textContent= 'Inserisci un Username Valido';
        return false;
    }
    const usernameRegex = /^[a-zA-Z0-9]+$/;
    if(!usernameRegex.test(username)){
        errormessage.textContent='L\'Username deve contenere caratteri validi';
        return false;
    }

    if(password.trim() === ''){
        errormessage.textContent='Inserisci una password valida';
        return false;
    }
    if(password.length<6){
        errormessage.textContent='La password deve contenere almeno 6 caratteri';
        return false;
    }

    if (password !== Confirmpassword) {
        errormessage.textContent = 'Le Password non coincidono';
        return false;
    }

    return true;
}