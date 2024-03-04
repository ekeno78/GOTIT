<?php
// Inclure la configuration de la base de données et autres fichiers nécessaires
include 'index.php'; // Fichier contenant la connexion à la base de données
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email_utilisateur'];
    $password = $_POST['Password_utilisateur'];

    if ($email != "" && $password != "") {

        // Vérification de l'authentification dans la base de données
        $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE Email_utilisateur = ? AND Password_utilisateur = ?");
        $req->execute([$email, $password]);
        $utilisateur = $req->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur) {
            // Authentification réussie

            // Stocker des informations sur l'utilisateur dans la session
            $_SESSION['utilisateur'] = $utilisateur;

            // Redirection en fonction du rôle de l'utilisateur
            if ($utilisateur['role'] == 'admin') {
                // Redirection vers la page d'administration
                header("Location: ../page_admin.html");
                exit();
            } else {
                // Redirection vers la page utilisateur standard
                header("Location: ../index.html");
                exit();
            }
        } else {
            // Authentification échouée, rediriger vers une page de connexion avec un message d'erreur
            header("Location: login.php?error=auth_failed");
            exit();
        }
    }
}
?>
