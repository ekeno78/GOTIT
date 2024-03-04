<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
   <center> <h1> INSCRIPTION <h1> <center>
</head>
<body>
<header>
        <a href="#"><img src="./image/logo.png" alt="Logo" class="logo"></a>
        <nav class="navigation">
            <a href="index.html">Accueil</a>
            <a href="navigation/map/leaflet.php">Map</a>
            <a href="navigation/repertoire/repertoire.php">Répertoire</a>
            <a href="navigation/recherche/rechercheB.php">Recherche</a>
            <a href="navigation/contact/contact.html">Contact et plus..</a>
            <button class="btnLogin-popup">Connexion</button>
        </nav>
    </header>


    <div class="wrapper">
        <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
        <div class="form-box login">
            <h2>Connexion</h2>
            <form method="POST" action="authentification/login.php">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" id="Email_utilisateur" name="Email_utilisateur" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="Password_utilisateur" name="Password_utilisateur" required>
                    <label>Mot de passe</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Se rappeler de moi</label>
                    <a href="#"> Mot de passe oublié ?</a>
                </div>
                <button type="submit" class="btn">Connexion</button>
                <div class="login-register">
                    <p>Vous n'avez pas de compte ? <a href="#" class="register-link"> Inscription</a></p>
                </div>
        </div>
        </form>



        <div class="form-box register">
            <h2>Inscription</h2>
            <form method="POST" action="authentification/traitement.php">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" id="Identifiant" name="Identifiant" required>
                    <label>Identifiant</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" id="Email_utilisateur" name="Email_utilisateur" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="Password_utilisateur" name="Password_utilisateur" required>
                    <label>Mot de passe</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">J'accepte les conditions d'utilisation</label>

                </div>
                <button type="submit" class="btn">S'inscrire</button>
                <div class="login-register">
                    <p>Vous avez déjà un compte ? <a href="#" class="login-link"> Connexion</a></p>
                </div>
        </div>
    </div>
    </form>
    </div>
    </div>
<?php

include 'index.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //extract($_POST);
    
    $identifiant = $_POST['Identifiant'];
    $email = $_POST['Email_utilisateur'];
    $password = $_POST['Password_utilisateur'];

    $requete = $bdd->prepare("INSERT INTO utilisateurs VALUES (0, :Identifiant, :Email_utilisateur, :Password_utilisateur)");
    $requete->execute(
        array(
         "Identifiant"=> $identifiant,
         "Email_utilisateur"=> $email,
        "Password_utilisateur"=> $password
        )    
        );
        header("location: ../index.html");
}


?>
</body>
</html>