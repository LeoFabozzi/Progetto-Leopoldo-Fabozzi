<?php
session_start();

if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true ){
    header("location: login.html");
    exit;
}


require_once('config.php');

$id_utente = $_SESSION['id'];// si riferisce all'id recuperato nel login.php
$nome = $connessione->real_escape_string($_SESSION['username']);
$argomento = $connessione->real_escape_string($_POST['Argomento']);
$descrizione = $connessione->real_escape_string($_POST['descrizione']);


$sql = "INSERT INTO votazione (id_utente, nome, Argomento, descrizione) VALUES ('$id_utente', '$nome', '$argomento', '$descrizione')";

if ($connessione->query($sql) === TRUE) {
    echo '
    <script>
        alert("VOTAZIONE INVIATA CON SUCCESSO ");
        window.location= "area-privata.php";
    </script>   
    '; 
} else {
    echo "Errore nell'invio della votazione: " . $connessione->error;
}

$connessione->close();
?>
