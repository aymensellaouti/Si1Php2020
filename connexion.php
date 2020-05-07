<?php
require_once 'getConnexion.php';
//Notre requete


$req = "select * from personne";

if (isset($_POST['filter']) && strlen($_POST['filter']) > 0) {
    $filtre = $_POST['filter'];
    $req.= " where firstname like '% :filter %' or name like '% :filter %' or job like '% :filter %'";
}
//execution de la requete
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

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>

<h1>Liste des utilisateurs</h1>
<form action="" method="post">
    <input type="text" name="filter" class="form-control">
    <button class="btn btn-danger" type="submit">Filtrer</button>
</form>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Firstname</th>
        <th>Name</th>
        <th>Age</th>
        <th>Cin</th>
        <th>Job</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($personnes as $personne) {
    ?>
    <tr>
        <td><?= $personne->id ?></td>
        <td><img
                    src="<?= $personne->path?>"
                    width="50px"
                    heigth="50px"
                    class="rounded-circle"
                    alt="<?= $personne->name ?>">
        </td>
        <td><?= $personne->firstname ?></td>
        <td><?= $personne->name ?></td>
        <td><?= $personne->age ?></td>
        <td><?= $personne->cin ?></td>
        <td><?= $personne->job ?></td>
        <td><a href="deletePersonne.php?id=<?= $personne->id ?>">Delete</a></td>
    </tr>
    <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>
