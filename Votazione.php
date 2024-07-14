
<?php

session_start();
if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true ){
    header("location: login.html");
    exit;
}

?>





<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <link rel="stylesheet" href="style2.css">
        <link rel="stylesheet" href="style3.css">
         
        
</head>

        <title> Votazione </title>


        <body>



        <header class="header">      
                <div class="header_content">
                    <div class="header_titolo">
                        <strong>Sistema di Voting Online</strong>
                    </div>
                    <ul class="header_menu">
                        <li><a href="area-privata.php">Home</a></li>
                        <li><a href="Votazione.php">Votazione</a></li>
                        <li><a href="Sondaggio.php">Sondaggio</a></li>
                       <li><a href="./logout.php">logout</a></li>
                        
                        
                        
                    </ul>
                    <div class="header_quick">
                        <a href=" ">Area Personale</a>
                        <div class="dropdown">
                    <a href="report_utente.php">Report Voti</a>
                    <a href="report_sondaggio.php">Report Sondaggio</a>
                </div>
                            <span></span>
                            <span></span>
                      
                        <span></span>
                        <span></span>
                    </div>
                    </div>
                    </div>

        </header>
       
        
        <div class="cover">
        <div class="cover_content white-box">
            <h1 class="white-box">Sistema Di Votazione</h1>
            <h2 class="white-box">Qui potrai creare una votazione su un argomento specifico, <br></br> visualizzare tutte le votazioni disponibili per esprimere la tua opinione<br></br> oppure solo per uno specifico argomento. </h2>
            <br><br>
            <a href="crea_votazione.php" class="button">CREA VOTAZIONE</a>
            <a href=" vota.php" class="button">Visualizza Tutte le Votazioni </a>
            <a href="filtraArgomentoV.php" class="button">Filtra per Argomento</a>
        </div>
        </div>

       
           
        

            </body>

            </html>