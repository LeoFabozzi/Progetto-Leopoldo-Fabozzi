<?php


session_start();
if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true ){
    header("location: login.html");
    exit;
}


// Connessione al database (sostituisci con le tue credenziali)
require_once('config.php');

// Verifica se il modulo di voto è stato inviato
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ottieni l'ID dell'utente dalla sessione
    $user_id = $_SESSION['id'];
    
    // Ottieni l'ID della votazione e controlla se l'utente ha già votato per quella votazione
    $id_votazione = $_POST['id_votazione'];
    $sql_check_vote = "SELECT * FROM voti_votazione WHERE id_utente = '$user_id' AND id_votazione = '$id_votazione'";
    $result_check_vote = $connessione->query($sql_check_vote);
    
    if ($result_check_vote->num_rows == 0) {
        // L'utente non ha ancora votato per questa votazione, quindi registra il voto
        $sql_insert_vote = "INSERT INTO voti_votazione (id_utente, id_votazione) VALUES ('$user_id', '$id_votazione')";
        if ($connessione->query($sql_insert_vote) === TRUE) {
            $sql_update_numvotazioni = "INSERT INTO votazione (id, numero_voti)
                                        VALUES ('$id_votazione', 1)
                                        ON DUPLICATE KEY UPDATE numero_voti = numero_voti + 1";
            if($connessione->query($sql_update_numvotazioni) === TRUE){                            
            echo '
            <script>
                alert("VOTO INVIATA CON SUCCESSO ");
                window.location= "Votazione.php";
            </script>   
            '; 
            }
         else {
            echo "Errore nell'aggiornamento del numero di voti: " . $connessione->error;
        }
    }else{
        echo "Errore nella registrazione del voto: " . $connessione->error;
    }
  
}else {
    // L'utente ha già votato
    echo '
    <script>
        alert("Il tuo voto per questa votazione è già registrato.");
        window.location= "area-privata.php";
    </script>   
    '; 

   }
}

$connessione->close();
?>