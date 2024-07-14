
<?php

session_start();
if(!isset($_SESSION['admin']) || $_SESSION['admin'] !== true ){

    header("location: login_admin.php");
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



        <header class="header">      <!-  contine l header->
                <div class="header_content">
                    <a class="header_titolo">
                        <strong>Sistema di Voting Online</strong>
                    </a>
                    <ul class="header_menu">
                        <li><a href="area-privata_admin.php">Home</a></li>
                       <li><a href="./logout.php">logout</a></li>
                        
                        
                        
                    </ul>
                  
                          
                    </div>
                    

        </header>
       
        
        <div class="cover">
        <div class="cover_content white-box">
            <h1 class="white-box">Generazione Report dei Risultati </h1>
            <h2 class="white-box">Questa sezione permette di creare  Report dei Risultati su tutti i Sondaggi e le Votazioni, con i relativi voti in formato PDF </h2>
            <br><br>
            <a href="report_RisultatiVotazione.php" class="button">Report Votazioni</a>
            <a href=" report_RisultatiSondaggio.php" class="button">Report Sondaggi</a>
        </div>
        </div>

       
           
        

            </body>

            </html>