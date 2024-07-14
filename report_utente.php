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
            color: #000;
        }
        h1 {
            text-align: center;
            font-size: 1.7rem;
        }
    </style>
</head>
<body>
    <h1>Report dei Voti</h1>
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
        $sql="SELECT * FROM votazione WHERE id_utente='$user_id' GROUP BY id ORDER BY numero_voti DESC";
      
        if($result= $connessione->query($sql)){
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='report'>";
                echo "<h3>"  . htmlspecialchars($row['nome']) . "</h3>";
                echo "<p>Argomento: "  . htmlspecialchars($row['Argomento']) . "</p>";
                echo "<p>Descrizione: "  . htmlspecialchars($row['descrizione']) . "</p>";
                echo "<p>Numero di voti: "  . htmlspecialchars($row['numero_voti']) . "</p>";
                echo "<a href='eliminaEvento.php?id_votazione=" . $row['id'] . "' onclick=\"return confirm('Sei sicuro di voler eliminare questa votazione?');\">Elimina</a>";
                echo "</div>";
            }
        } else {
            echo "<p>Nessuna Votazione disponibile.</p>";
        }
    }else{
        echo "Errore nella query: " . $connessione->error;
    }

        $connessione->close();
        ?>
    </div>
</body>
</html>