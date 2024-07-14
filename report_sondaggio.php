<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report dei Voti</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #17a2b8;
            margin: 0;
            padding: 20px;
            color: #fff;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .report {
            border: 1px solid #ccc;
            background-color: #EAEAEA;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            color: #000;
        }
        .report h3 {
            margin-top: 0;
            color: #17a2b8;
        }
        .report p {
            margin: 5px 0;
        }
        h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
        }
       
    </style>
</head>
<body>
    <h1>Report dei Sondaggi</h1>
    <div class="container">
        <?php
        session_start();
        if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true) {
            header("location: login.html");
            exit;
        }

        require_once('config.php');

        $user_id = $_SESSION['id'];

        // Recupera i risultati delle votazioni 
        $sql ="SELECT * FROM sondaggio WHERE id_utente='$user_id'";

        // Preparazione della query
        if ($result= $connessione->query($sql)) {
           
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='report'>";
                    echo "<h3>" . htmlspecialchars($row['nome']) . "</h3>";
                    echo "<p><strong>Argomento:</strong> " . htmlspecialchars($row['argomento']) . "</p><br>";
                    echo "<p><strong>Domanda:</strong> " . htmlspecialchars($row['domanda']) . "</p> <br>";
                    echo "<p><strong>Risposta 1:</strong> " . htmlspecialchars($row['risposta1']) . "</p>";
                    echo "<p>(Voto):" . htmlspecialchars($row['votoR1']) . "</p><br>";
                    echo "<p><strong>Risposta 2:</strong> " . htmlspecialchars($row['risposta2']) . "</p>";
                    echo "<p>(Voto):" . htmlspecialchars($row['votoR2']) . "</p><br>";
                    echo "<p><strong>Risposta 3:</strong> " . htmlspecialchars($row['risposta3']) . "</p>";
                    echo "<p>(Voto):" . htmlspecialchars($row['votoR3']) . "</p><br>";
                    echo "<p><strong>Risposta 4:</strong> " . htmlspecialchars($row['risposta4']) ."</p>";
                    echo "<p>(Voto):" . htmlspecialchars($row['votoR4']) . "</p><br>";
                    echo "<a href='eliminaEvento.php?id_sondaggio=" . $row['id'] . "' onclick=\"return confirm('Sei sicuro di voler eliminare questo sondaggio?');\">Elimina</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nessun Sondaggio disponibile.</p>";
            }

           
        } else {
            echo "Errore nella preparazione della query: " . $connessione->error;
        }

        $connessione->close();
        ?>
    </div>
</body>
</html>
