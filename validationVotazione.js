function validateForm(){
    const argomento=document.getElementById('Argomento').value;
    const descrizione=document.getElementById('descrizione').value;
    const errormessage=document.querySelector('.text-danger');

    const categorie=["Sport",
        "Politica",
        "Istruzione",
        "Cultura",
        "Attualita' ",
        "Economia",
        "Alimentazione"
    ]

    errormessage.textContent='';

    if(argomento.trim() === ''){
        errormessage.textContent='Argomento Obbligatorio';
        return false;
    }

    const argomentoRegex=/^(Sport|Politica|Istruzione|Cultura|Attualità|Economia|Alimentazione)$/;
    if(!argomentoRegex.test(argomento)){
        errormessage.textContent="L'argomento inserito non è valido. Inserisci una delle seguenti categorie: " + categorie.join(", ");
        return false;

    }

    if(descrizione.trim() === ''){
        errormessage.textContent='Descrizione Obbligatorio';
        return false;
    }


    const descrizioneRegex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ.'\?\!\/\s]+$/;
    if(!descrizioneRegex.test(descrizione)){
        errormessage.textContent='La descrzione deve contenere caratteri validi';
        return false;
    }


    if (descrizione.length < 10) {
        errorMessage.textContent = 'La descrizione deve contenere almeno 10 caratteri';
        return false;
    }


    return true;


}