<?php
session_start();
if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true) {
    header("location: login.html");
    exit;
}

require_once('config.php');

$user_id = $_SESSION['id'];

if (isset($_GET['id_votazione'])) {
    $id_votazione = $_GET['id_votazione'];

    
    $query = "SELECT * FROM votazione WHERE id = '$id_votazione' AND id_utente = '$user_id'";
    $result = $connessione->query($query);

    if ($result && $result->num_rows > 0) {
        
        $sql_voti = "DELETE FROM voti_votazione WHERE id_votazione = '$id_votazione'";
        $result_voti = $connessione->query($sql_voti);

     
        $sql = "DELETE FROM votazione WHERE id = '$id_votazione'";
        $result = $connessione->query($sql);

        if ($result) {
            echo '
            <script>
                alert("Votazione eliminata con successo");
                window.location = "area-privata.php";
            </script>';
        } else {
            echo '
            <script>
                alert("Impossibile eliminare la votazione");
                window.location = "area-privata.php";
            </script>';
        }
    } else {
        echo '
        <script>
            alert("Non sei autorizzato a eliminare questa votazione");
            window.location = "area-privata.php";
        </script>';
    }
} else if (isset($_GET['id_sondaggio'])) {
    $id_sondaggio = $_GET['id_sondaggio'];

    
    $query = "SELECT * FROM sondaggio WHERE id = '$id_sondaggio' AND id_utente = '$user_id'";
    $result = $connessione->query($query);

    if ($result && $result->num_rows > 0) {
        
        $sql_voti = "DELETE FROM voti_sondaggio WHERE id_sondaggio = '$id_sondaggio'";
        $result_voti = $connessione->query($sql_voti);

      
        $sql_sondaggio = "DELETE FROM sondaggio WHERE id = '$id_sondaggio'";
        $result = $connessione->query($sql_sondaggio);

        if ($result) {
            echo '
            <script>
                alert("Sondaggio eliminato con successo");
                window.location = "area-privata.php";
            </script>';
        } else {
            echo '
            <script>
                alert("Impossibile eliminare il sondaggio");
                window.location = "area-privata.php";
            </script>';
        }
    } else {
        echo '
        <script>
            alert("Non sei autorizzato a eliminare questo sondaggio");
            window.location = "area-privata.php";
        </script>';
    }
}

$connessione->close();
?>
