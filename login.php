<?php

require_once('config.php');

$email=$connessione->real_escape_string($_POST['email']);
$password=$connessione->real_escape_string($_POST['password']);


if($_SERVER["REQUEST_METHOD"] === "POST"){ // entra qui solo tramite una post

    $sql_select = "SELECT * FROM utenti WHERE email = '$email' "; 

    if($result= $connessione->query($sql_select)){
        if($result->num_rows == 1){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if(password_verify($password,$row['password'])){
                session_start();

                $_SESSION['loggato']=true;
                $_SESSION['id']= $row['id'];
                $_SESSION['email']= $row['email'];
                $_SESSION['username']= $row['username'];
                header("location: area-privata.php");

            }else{
               
                echo '
                <script>
                    alert("Password sbagliata ");
                    window.location= "login.html";
                </script>   
                '; 
                

               
            }
        }else{
            echo '
            <script>
                alert(" Non ci sono account associati ai dati forniti ");
                window.location= "login.html";
            </script>   
            '; 
        }
    }else{
        echo '
                <script>
                    alert("Errore in fase di login ");
                    window.location= "login.html";
                </script>   
                '; 
    }

    $connessione->close();
}



?>