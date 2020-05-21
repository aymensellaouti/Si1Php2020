<?php
require_once 'getConnexion.php';
if (isset($_GET['id'])) {
    $response = $bdd->prepare('delete from personne where id=:id');
    $response->execute(
        array(
            'id' => $_GET['id']
        )
    );
}
header('location:personnes.php');