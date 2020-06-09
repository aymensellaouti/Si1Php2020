<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
<!--
    Action : script ou page vers laquelle on va envoyer les données du formulaire
    method: method d'envoi :
        get: Envoi via le url
        post: envoi dans le corps de la requete (Form-data)
-->
<form action="handleForm.php" method="post">
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" class="form-control">
    <label for="age">Age</label>
    <input type="text" id="age" name="age" class="form-control">
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

</body>
</html>