<?php
if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['job']) && isset($_POST['section']) ) {

    require_once 'auth/isAuthenticated.php';
    require_once 'getConnexion.php';
//Notre requete
    $req = "insert into personne (name, job, age, section_id) values (:name, :job, :age, :section)";
//    die($req);
    $response = $bdd->prepare($req);
    $resultat = $response->execute(array(
            'name' => $_POST['name'],
            'job' => $_POST['job'],
            'section' => $_POST['section'],
            'age' => $_POST['age'],
        ));
//recup des données sous format objet
    if ($resultat) {
        $_SESSION['success'] = "${_POST['name']} ajoutée avec succès :)";
        header('location:personnes.php');
    } else {
        $_SESSION['error'] = "Problème au niveau de la base de données :(";
        header('location:addEtudiant.php');
    }
} else {
    header('location:personnes.php');
}
