function validateForm() {
    const argomento=document.getElementById('Argomento').value;
    const domanda=document.getElementById('domanda').value;
    const opzione1=document.getElementById('risposta1').value;
    const opzione2=document.getElementById('risposta2').value;
    const opzione3=document.getElementById('risposta3').value;
    const opzione4=document.getElementById('risposta4').value;
    const errormessage=document.querySelector('.text-danger');


    const categorie=["Sport",
        "Politica",
        "Istruzione",
        "Cultura",
        "Attualità",
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

    if(domanda.trim() === ''){
        errormessage.textContent='domanda Obbligatorio';
        return false;
    }


    const domandaRegex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ.'\?\!\/\s]+$/;
    if(!domandaRegex.test(domanda)){
        errormessage.textContent='La domanda deve contenere caratteri validi';
        return false;
    }


    if (domanda.length < 6) {
        errormessage.textContent = 'La domanda deve contenere almeno 6 caratteri';
        return false;
    }

    const opzioneRegex = /^[a-zA-Z0-9àèéìòùÀÈÉÌÒÙ.'\!\/\s]+$/;
    if(!opzioneRegex.test(opzione1)){
        errormessage.textContent='L\'opzione 1 deve contenere caratteri validi';
        return false;
    }
    if(!opzioneRegex.test(opzione2)){
        errormessage.textContent='L\'opzione 2 deve contenere caratteri validi';
        return false;
    }
    if(opzione3 && !opzioneRegex.test(opzione3)){
        errormessage.textContent='L\'opzione 3 deve contenere caratteri validi';
        return false;
    }
    if(opzione4 && !opzioneRegex.test(opzione4)){
        errormessage.textContent='L\'opzione 4 deve contenere caratteri validi';
        return false;
    }

    return true;


}
