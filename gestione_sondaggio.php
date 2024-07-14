<?php
session_start();
if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true) {
    header("location: login.html");
    exit;
}

require_once('config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION['id'];
    $id_sondaggio = $_POST['id_sondaggio'];
    $risposta = $_POST['risposta'];

    // Verifica se l'utente ha già votato per questo sondaggio
    $sql_check_vote = "SELECT * FROM voti_sondaggio WHERE id_utente='$user_id' AND id_sondaggio='$id_sondaggio'";
    $result = $connessione->query($sql_check_vote);

    if ($result->num_rows == 0) {
        // Inserisci il voto dell'utente nella tabella voti_sondaggio
        $sql_insert_vote = "INSERT INTO voti_sondaggio (id_utente, id_sondaggio, Voto_Sondaggio) VALUES ('$user_id', '$id_sondaggio', '$risposta')";
        if ($connessione->query($sql_insert_vote) === TRUE) {
            // Aggiorna il conteggio dei voti nella tabella sondaggio
            if ($risposta === 'R1') {
                $sql_update_numvotazioni = "UPDATE sondaggio SET votoR1 = votoR1 + 1 WHERE id = '$id_sondaggio'";
            } elseif ($risposta === 'R2') {
                $sql_update_numvotazioni = "UPDATE sondaggio SET votoR2 = votoR2 + 1 WHERE id = '$id_sondaggio'";
            } elseif ($risposta === 'R3') {
                $sql_update_numvotazioni = "UPDATE sondaggio SET votoR3 = votoR3 + 1 WHERE id = '$id_sondaggio'";
            } elseif ($risposta === 'R4') {
                $sql_update_numvotazioni = "UPDATE sondaggio SET votoR4 = votoR4 + 1 WHERE id = '$id_sondaggio'";
            }

            if ($connessione->query($sql_update_numvotazioni) === TRUE) {
                echo '
                <script>
                    alert("Voto inviato con successo.");
                    window.location = "Sondaggio.php";
                </script>';
            } else {
                echo "Errore nell'aggiornamento dei voti: " . $connessione->error;
            }
        } else {
            echo "Errore nella registrazione del voto: " . $connessione->error;
        }
    } else {
        // L'utente ha già votato per questa candidatura
        echo '
        <script>
            alert("Hai già votato questo sondaggio.");
            window.location = "area-privata.php";
        </script>';
    }
}

$connessione->close();
?>
