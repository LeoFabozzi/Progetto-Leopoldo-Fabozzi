<?php

require_once('config.php');


//$sql="INSERT INTO utenti (email,username,password) VALUES('$email','$username', '$password')";

if($_SERVER["REQUEST_METHOD"] === "POST"){ // entra qui solo tramite una post
    $email=$connessione->real_escape_string($_POST['email']);
$password=$connessione->real_escape_string($_POST['password']);

    $sql_select = "SELECT * FROM admin_login WHERE email = '$email' "; 

    if($result= $connessione->query($sql_select)){
        if($result->num_rows == 1){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if(password_verify($password,$row['password'])){
                session_start();

                $_SESSION['loggato']=true;
                $_SESSION['admin']=true;
                $_SESSION['id']= $row['id'];
                $_SESSION['email']= $row['email'];
                header("location: area-privata_admin.php");

            }else{
               
                echo '
                <script>
                    alert("Password sbagliata ");
                    window.location= "login_admin.php";
                </script>   
                '; 
                

               
            }
        }else{
            echo '
            <script>
                alert(" Non ci sono account con username ");
                window.location= "login_admin.php";
            </script>   
            '; 
        }
    }else{
        echo '
                <script>
                    alert("Errore in fase di login ");
                    window.location= "login_admin.php";
                </script>   
                '; 
    }

    $connessione->close();
}



?>




<style>
           
           body{
                display: flex;
                justify-content: center;
                margin: 0;
                padding: 0;
                background-color: #17a2b8;
                height: 100vh;
            }
            form{
                display: flex;
                flex-direction: column;
                width:  300px;

            }
            form > input{
                margin-bottom: 20px;
            }

            form {
             margin-top: 120px;
             max-width: 600px;
            height: 320px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
            }
        form {
             padding: 20px;
            }
        form {
            
             margin-top: 125px; /* spostain basso o in altro la finestra Accedi*/
            }
        </style>

<form method="POST">
<h2>Login Admin</h2>
    Email: <input type="email" name="email" required>
    Password: <input type="password" name="password" required><br>
   
    <button type="submit">Invia</button>
    <p><a href="index.php">Torna Alla Home</a></p>
    <p>Sei un Admin ma non hai un Account? <a href="register_admin.php">Registrati</a></p>
</form>