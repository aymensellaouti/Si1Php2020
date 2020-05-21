<?php
require_once 'auth/isAuthenticated.php';
require_once 'getConnexion.php';

if (isset($_GET['id'])) {
    $req = "select p.id, p.name, p.job, p.age, p.path, s.designation as section from personne p, section s where p.section_id = s.id and p.id = :id";
    $response = $bdd->prepare($req);
    $response->execute(
        array(
            'id' => $_GET['id']
        )
    );

    $personne = $response->fetch(PDO::FETCH_OBJ);
    if(!$personne) {
        $_SESSION['error'] = "La personne d'id ${_GET['id']} n'existe pas";
        header('location:personnes.php');
    }
} else {
    header('location:personnes.php');
}

include_once 'fragments/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-6">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="<?= $personne->name ?>" src="
<?php
                    if ($personne->path == '') {
                        echo 'assets/images/profile.jpg';
                    } else {
                        echo $personne->path;
                    }
                    ?>
">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="https://scripteden.com/">
                            <?= $personne->name ?>
                        </a>
                    </div>
                    <div class="desc"><?= $personne->job ?></div>
                    <div class="desc"><?= $personne->age ?> ans</div>
                    <div class="desc"><?= $personne->section ?></div>
                </div>
                <div class="bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher"
                       href="https://plus.google.com/+ahmshahnuralam">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                       href="https://plus.google.com/shahnuralam">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                        <i class="fa fa-behance"></i>
                    </a>
                </div>
            </div>

        </div>


<?php
include_once 'fragments/footer.php';
?>