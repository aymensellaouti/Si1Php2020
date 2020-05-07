<?php
    function showTab($tab) {
        foreach ($tab as $cle  =>$valeur) {
            echo $cle. ' : '. $valeur. '<br>';
        }
    }
    $chaine = "Bonjour SI1 c'est un exercice pour pratiquer les boucles , les tableux et les chaines";
    $stats = count_chars($chaine, 1);
    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <table class="table table-hover">
        <thead>
            <th>Caractère</th>
            <th>Nombre d'occurences</th>
        </thead>
        <tbody>
         <?php
            foreach ($stats as $caractere => $nbOcc) {
            ?>
                <tr>
                    <td><?= chr($caractere) ?></td>
                    <td><?= $nbOcc ?></td>
                </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>
