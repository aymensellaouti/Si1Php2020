<?php
// Créer ou récupérer une session
session_start();
// Si c'est la première visite : on lui dit bienvenu c'est votre premiere visite
if(!isset($_SESSION['nbVisite'])) {
    echo "<h1>Bienvenu c'est votre première visite</h1>";
    $_SESSION['nbVisite'] = 1;
} else {
    $_SESSION['nbVisite']++;
    echo "<h1>Rebonjour c'est votre visite numéro ${_SESSION['nbVisite']}</h1>";
}
// Sinon on lui dit Rebonjour c'est votre visite numero : numVisite