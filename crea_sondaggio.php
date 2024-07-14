<?php

session_start();

// Verifica se l'utente ha effettuato l'accesso

if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true ){
    header("location: login.html");
    exit;
}

$username= isset($_SESSION['username']) ? $_SESSION['username'] : '';

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creazione Sondaggio</title>
    <script src="validationSondaggio.js" defer></script>

    <style>
         body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #17a2b8; /* Azzurrino */
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            background-color: #EAEAEA;
            border: 1px solid #9C9C9C;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 350px; /* Limita la larghezza per una migliore leggibilità */
            width: 100%;
        }

        h1 {
            font-size: 1.7rem;
            text-align: center;
            margin-bottom: 20px; /* Aggiunto margine inferiore per separazione */
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #555;
            font-size: 0.9rem; /* Ridotto leggermente la dimensione del carattere */
            font-weight: bold; /* Aggiunto il grassetto per enfatizzare */
        }

        input {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #9C9C9C;
            border-radius: 5px;
            width: calc(100% - 22px); /* Larghezza calcolata per includere il padding */
        }

    </style>

</head>

<body>
    <div class="container">
        <form action="processa_sondaggio.php" method="POST" onsubmit="return validateForm()">
            <h1>Creazione Sondaggio</h1>
            <label for="nome">Username:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($username);?>" disabled required>

            <label for="Argomento">Argomento:</label>
            <p>Scegli tra : Politica, Istruzione , Cultura, Attualità , Economia, Alimentazione e Sport </p>
            <input type="text" id="Argomento" name="Argomento" required>
            
            <label for="domanda">Domanda:</label>
            <input type="text" id="domanda" name="domanda" required>
            
            <label for="risposta1">Opzione 1 :</label>
            <input type="text" id="risposta1" name="risposta1" required>

            <label for="risposta2">Opzione 2 :</label>
            <input type="text" id="risposta2" name="risposta2" required>

            <label for="risposta3">Opzione 3 :</label>
            <input type="text" id="risposta3" name="risposta3">

            <label for="risposta4">Opzione 4 :</label>
            <input type="text" id="risposta4" name="risposta4">
            
            <input type="submit" value="Invia Sondaggio">
            <p><a href="area-privata.php">Torna Alla Home</a></p>

            <br>

            <div class="text-danger"></div>

        </form>
    </div>
</body>
</html>
