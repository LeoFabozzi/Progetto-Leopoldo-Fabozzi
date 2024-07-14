<?php
session_start();
if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true) {
    header("location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Area Privata</title>
    <style>
       
       /*per il menù a tendina  */
       
        .dropdown {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
            margin-top: 110px;
        }
        .dropdown a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown a:hover {
            background-color: #ddd;
        }
        .header_quick:hover .dropdown {
            display: block;
        }
 
    </style>
</head>
<body>
    <header class="header">
        <div class="header_content">
            <a class="header_titolo">
                <strong>Sistema di Voting Online</strong>
            </a>
            <ul class="header_menu">
                <li><a href="area-privata.php">Home</a></li>
                <li><a href="Votazione.php">Votazione</a></li>
                <li><a href="Sondaggio.php">Sondaggio</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
            <div class="header_quick">
                <a href=" ">Area Personale</a>
                <div class="dropdown">
                    <a href="report_utente.php">Report Votazioni</a>
                    <a href="report_sondaggio.php">Report Sondaggi</a>
                    
                </div>
            </div>
        </div>
    </header>
    <div class="cover" style="background-image: url('https://img.freepik.com/free-photo/perspective-exterior-nobody-empty-box_1258-260.jpg?size=626&ext=jpg&ga=GA1.1.2116175301.1714348800&semt=ais');">
        <div class="cover_content">
            <h1>Benvenuto nella tua Area Personale</h1>
            <h2>Esplora e partecipa alle ultime votazioni e sondaggi!</h2>
            <a href="Votazione.php" class="button">Scopri Ora</a>
        </div>
    </div>
    <div class="spacer"></div>
    <h1>Benvenuto Nel Sistema di Voting Online</h1>
    <h2>Esprimi la tua opinione</h2>
    <p1>Unisciti a noi per partecipare ai nostri sondaggi e condividere le tue opinioni con il mondo.</p1>
    <a href="Sondaggio.php" class="button">Partecipa Adesso</a>
</body>
</html>
