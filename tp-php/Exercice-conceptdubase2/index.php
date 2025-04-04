<?php
require_once 'Session.php';
$session = new Session("session1"); 

// incremente le compteur à chaque visite
$session->incrementer();

// reinitialisation de la session
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $session->reinitialiser();
    header("Refresh:0"); // pour recharger la page
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compteur de visites</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        .message { font-size: 1.2em; margin: 20px; }
        button { padding: 10px 15px; background: #ff4757; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <?php 
    if ($session->getNbreVisites() === 1) {
        echo '<div class="message">Bienvenue à notre plateforme !</div>';
    } else {
        echo '<div class="message">Merci pour votre fidélité, c’est votre ' . $session->getNbreVisites() . 'ème visite.</div>';
    }
    ?>
    <form method="post">
        <button type="submit" name="reset">Réinitialiser la session</button>
    </form>
</body>
</html>