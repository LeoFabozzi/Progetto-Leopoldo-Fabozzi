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
        <style>
 
 body{
                display: flex;
                justify-content: center;
                margin: 0;
                padding: 0;
                background-color: #17a2b8;
                height: 100vh;
            }

            </style>
        
        
</head>

        <title> Votazione </title>


        <body>



        <header class="header">      <!-  contine l header->
                <div class="header_content">
                    <a class="header_titolo">
                        <strong>Sistema di Voting Online</strong>
                    </a>
                    <ul class="header_menu">
                        <li><a href="area-privata.php">Home</a></li>
                        <li><a href="Votazione.php">Votazione</a></li>
                        <li><a href="Sondaggio.php">Sondaggio</a></li>
                       <li><a href="./logout.php">logout</a></li>
                        
                        
                        
                    </ul>
                    <div class="header_quick">
                        <a href="#">Area Personale</a>
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
            <h1 class="white-box">Sistema Di Sondaggio</h1>
            <h2 class="white-box">Qui potrai decidere se creare un sondaggio per uno specifico argomento, <br></br> visualizzare tutti i sondaggi disponibili per esprimere la tua opinione  <br></br> oppure scegliere i sondaggi da visualizzare in base all'argomento desiderato </h2>
            <br><br>
            <a href="crea_sondaggio.php" class="button">CREA SONDAGGIO</a>
            <a href=" vota_sondaggio.php" class="button">Visualizza tutti i Sondaggi</a>
            <a href="filtraArgomentoS.php" class="button">Filtra per Argomento</a>
        </div>
        </div>

       
           
        

            </body>

            </html>