<?php
require_once('config.php'); // Connessione al database


$codice_segreto = "1234";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if($_POST['codice_segreto'] === $codice_segreto){
    $email = $connessione->real_escape_string($_POST['email']);
    $hashedpassword = password_hash($_POST['password'], PASSWORD_DEFAULT); // Cripta la password
   

    $check_query = "SELECT * FROM admin_login WHERE email = '$email'";
    $result=$connessione->query($check_query);

    if($result->num_rows == 0){
        $sql = "INSERT INTO admin_login (email, password) VALUES ('$email','$hashedpassword')";
        
        if ($connessione->query($sql) === true) {
            // Reindirizza l'utente all'area privata dopo la registrazione
            header("location: login_admin.php");
            exit; // Termina lo script dopo il reindirizzamento
        } else {
            echo "Errore durante la registrazione utente: " . $connessione->error;
        }
    } else {
        echo '
                <script>
                    alert("email o username già utilizzati ");
                    window.location= "register_admin.php";
                </script>   
                '; 
    }

  }
}
// Chiudi la connessione al database
$connessione->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 300px;
        }

        form>input {
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
            margin-top: 125px;
            /* sposta in basso o in alto la finestra Accedi */
        }
    </style>
    <script src="validationRegisterAdmin.js" defer></script>
</head>

<body>
    <form method="POST" onsubmit="return validateForm()">
        <h2>Registrazione Admin</h2>
        Email: <input type="email" name="email" id="email" required>
        Password: <input type="password" name="password" id="password" required><br>
        Codice Segreto (solo per amministratori): <input type="password" name="codice_segreto" id="codice_segreto"><br>

        <button type="submit">Invia</button>
        <p><a href="index.php">Torna Alla Home</a></p>

        <div class="text-danger"></div>
    </form>
</body>

</html>
