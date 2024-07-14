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
    <title>Creazione Votazione</title>
    
    <!-- Aggiungi collegamenti a fogli di stile CSS, se necessario -->
    <style>

body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #17a2b8; /* Azzurrino */
} 
form{
    display: flex;
    flex-direction: column;
    width:  300px;
    border: 1px solid #9C9C9C;
    background-color: #EAEAEA;
    padding: 20px;

            }
            form > input{ /* dove si mette nome e cognome */
                margin-bottom: 20px;
            }

            h1{
                font-size: 1.7rem;
                font-family: Arial, Helvetica, sans-serif;
                
            }
    



        </style>

<script src="validationVotazione.js" defer></script>
       
</head>


<body>

    <div class="container">
   
    <form action="processa_votazione.php" method="POST" onsubmit="return validateForm()">
    <h1>Creazione Votazione</h1>
    <br></br>
        <label for="nome">Username :</label>
         <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($username); ?>" readonly required>


        <label for="Argomento">Argomento:</label>
        <p>Scegli tra : Politica, Istruzione , Cultura, Attualità , Economia, Alimentazione e Sport </p>
        <input type="text" id="Argomento" name="Argomento" required>
         
            
      <br><br>
        
        <label for="descrizione">Descrizione:</label><br>
        <textarea id="descrizione" name="descrizione" rows="4" cols="50" required></textarea><br><br>
        
        <input type="submit" value="Invia">
        <p><a href="area-privata.php">Torna Alla Home</a></p>
        <br>
        
        <div class="text-danger"></div>
    </form>
   
</div>


</body>
</html>