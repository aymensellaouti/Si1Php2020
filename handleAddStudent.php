<?php
if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['job']) && isset($_POST['section']) ) {

    require_once 'auth/isAuthenticated.php';
    require_once 'getConnexion.php';
    $pathname = '';
    if(isset($_FILES['image'])) {
    $monImage = $_FILES['image'];
    $pathname = md5(uniqid()).$monImage['name'];
    $pathname = "assets/uploads/$pathname";
    move_uploaded_file($monImage['tmp_name'], $pathname);
    }
    //Notre requete
    $req = "insert into personne (name, job, age, path, section_id) values (:name, :job, :age, :image, :section)";
//    die($req);
    $response = $bdd->prepare($req);
    $resultat = $response->execute(array(
            'name' => $_POST['name'],
            'job' => $_POST['job'],
            'section' => $_POST['section'],
            'age' => $_POST['age'],
            'image' => $pathname
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
