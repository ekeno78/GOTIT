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