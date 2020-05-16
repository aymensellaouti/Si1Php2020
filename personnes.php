<?php
require_once 'auth/isAuthenticated.php';
require_once 'getConnexion.php';
//Notre requete
$req = "select p.id, p.name, p.job, p.age, p.path, s.designation as section from personne p, section s where p.section_id = s.id ";
if (isset($_POST['filter']) && strlen($_POST['filter']) > 0) {
    $filtre = $_POST['filter'];
    $req.= " and ( p.name like :filter or p.job like :filter)";
}
//execution de la requete
$filtre = "%$filtre%";
$response = $bdd->prepare($req);
if(isset($filtre)) {
    $response->execute(
        array(
                'filter' => $filtre
        )
    );
} else {
    $response->execute(array());
}
//recup des données sous format objet
$personnes = $response->fetchAll(PDO::FETCH_OBJ);

include_once 'fragments/header.php';
?>

    <div class="container">
<h1>Liste des utilisateurs</h1>
<form action="" method="post">
    <input type="text" name="filter" class="form-control">
    <button class="btn btn-danger" type="submit">Filtrer</button>
</form>
    <a href="addEtudiant.php">
        <i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
    </a>

<table class="table table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Job</th>
        <th>Section</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($personnes as $personne) {
    ?>
    <tr>
        <td><?= $personne->id ?></td>
        <td><?= $personne->name ?></td>
        <td><?= $personne->age ?></td>
        <td><?= $personne->job ?></td>
        <td><?= $personne->section ?></td>
        <td><a href="deletePersonne.php?id=<?= $personne->id ?>">Delete</a></td>
    </tr>
    <?php
    }
    ?>
    </tbody>
</table>
</div>

<?php
include_once 'fragments/footer.php';
?>