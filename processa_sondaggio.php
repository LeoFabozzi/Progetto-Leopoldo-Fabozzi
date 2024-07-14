
<?php

session_start();

if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true ){
    header("location: login.html");
    exit;
}

require_once('config.php');

$id_utente=$_SESSION['id'];
$nome=$connessione->real_escape_string($_SESSION['username']);
$argomento=$connessione->real_escape_string($_POST['Argomento']);
$domanda=$connessione->real_escape_string($_POST['domanda']);
$risposta1=$connessione->real_escape_string($_POST['risposta1']);
$risposta2=$connessione->real_escape_string($_POST['risposta2']);
$risposta3=$connessione->real_escape_string($_POST['risposta3']);
$risposta4=$connessione->real_escape_string($_POST['risposta4']);

$sql_sondaggio="INSERT INTO sondaggio(id_utente,nome,argomento,domanda,risposta1,risposta2,risposta3,risposta4) VALUES ('$id_utente','$nome','$argomento','$domanda','$risposta1','$risposta2','$risposta3','$risposta4')";

if($connessione->query($sql_sondaggio)===TRUE){
    echo '
    
    <script>
        alert("SONDAGGIO CREATO CON SUCCESSO ");
        window.location ="area-privata.php";
        </script>
    ';
}else{
    echo "ERRORE NELL' INVIO DEL SONDAGGIO " .$connessione->error;
}

$connessione->close();


?>