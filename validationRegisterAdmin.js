function validateForm() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const codiceSegreto = document.getElementById('codice_segreto').value;
    const errorMessage = document.querySelector('.text-danger');

    errorMessage.textContent = '';

    // Controlla se i campi sono vuoti
    if (email.trim() === '') {
        errorMessage.textContent = 'Email Obbligatoria';
        return false;
    }

    // Regex per validare l'email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        errorMessage.textContent = 'Inserisci un email valida';
        return false;
    }

    if (password.trim() === '') {
        errorMessage.textContent = 'Inserisci una password valida';
        return false;
    }

    if (password.length < 6) {
        errorMessage.textContent = 'La password deve contenere almeno 6 caratteri';
        return false;
    }

    if (codiceSegreto.trim() === '') {
        errorMessage.textContent = 'Codice Segreto obbligatorio';
        return false;
    }

    return true;
}
