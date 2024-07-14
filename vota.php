<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza le votazioni e Vota</title>
    <style>
        /* Stili CSS per la formattazione della pagina */
        body {
            font-family: Arial, sans-serif;
            background: #17a2b8;
            margin: 0;
            padding: 20px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center; /* Allinea i riquadri al centro */
        }
        .votazione {
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
            padding: 20px;
            width: 300px;
            box-sizing: border-box;
        }
        h1 {
            font-size: 1.7rem;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;
        }
        button {
            padding: 10px;
            background-color: #444;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            background-color: #333;
        }
       
    </style>
</head>
<body>
    <h1>Votazioni Disponibili</h1>
    <div class="container">
        <?php
        // Verifica se l'utente ha effettuato l'accesso
        session_start();
        if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true ){
            header("location: login.html");
            exit;
        }

        require_once('config.php');
        
        $sql = "SELECT * FROM votazione";
        $result = $connessione->query($sql);

        // Mostra le votazione nella pagina HTML
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='votazione'>";
                echo "<h3>" . $row['nome'] . "</h3>";
                echo "<p>Argomento: " . $row['Argomento'] . "</p>";
                echo "<p>Descrizione: " . $row['descrizione'] . "</p>";
                echo "<form method='post' action='gestione_voti.php'>";
                echo "<input type='hidden' name='id_votazione' value='" . $row['id'] . "'>";
                echo "<button type='submit'>Vota</button>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "<p>Nessuna Votazione disponibile.</p>";
        }
    
        // Chiudi la connessione al database
        $connessione->close();
        ?>
    </div>
</body>
</html>