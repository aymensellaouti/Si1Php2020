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
    //UPDATE `personne` SET `job` = 'teacher' WHERE `personne`.`id` = 2;
    $req = "update personne set job = :job, name = :name, section_id = :section, age = :age";
    if(isset($_FILES['image'])) {
        $req.= ' , path= :image ';
    }
    $req.= ' where id = :id';
    $response = $bdd->prepare($req);
    $resultat = $response->execute(array(
            'name' => $_POST['name'],
            'job' => $_POST['job'],
            'section' => $_POST['section'],
            'age' => $_POST['age'],
            'image' => $pathname,
            'id' => $_GET['id']
        ));
//recup des données sous format objet
    if ($resultat) {
        $_SESSION['success'] = "${_POST['name']} mis à jour avec succès :)";
        header('location:personnes.php');
    } else {
        $_SESSION['error'] = "Problème au niveau de la base de données :(";
        header('location:personnes.php');
    }
} else {
    header('location:personnes.php');
}
