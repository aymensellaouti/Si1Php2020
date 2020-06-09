<?php
require_once 'auth/isAuthenticated.php';
require_once 'getConnexion.php';

if (isset($_GET['id'])) {
    // JE veux récupérer la personne d'id $_GET['id']
        // Si l'étudiant existe c'est ok je le cherche et
            // je remplie le formulaire par les infos de la personne
        // Sinon déclenche une erreur
    $req = "select p.id, p.name, p.job, p.age, p.path, s.id as idSection, s.designation as section from personne p, section s where p.section_id = s.id and p.id = :id";
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
}

$req = "select * from section";
$response = $bdd->prepare($req);
$response->execute(array());
$sections = $response->fetchAll(PDO::FETCH_OBJ);

include_once 'fragments/header.php';
?>

    <div class="container mt-5">
        <form
                action="<?php
                if (isset($_GET['id'])) {
                    echo "handleUpdateStudent.php?id=".$_GET['id'];
                } else {
                    echo "handleAddStudent.php";
                }
           ?>"
                method="post"
                enctype="multipart/form-data"
        >
            <div class="form-group">
                <label for="name">Name</label>
                <input
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="Enter name"
                        name="name"
                        required
                        value="<?php
                        $personne? $value = $personne->name: $value= '';
                        echo $value;
                        ?>"
                >
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input
                        type="number"
                        class="form-control"
                        id="age"
                        placeholder="Enter age"
                        name="age"
                        required
                        value="<?php
                            $personne? $value = $personne->age: $value= '';
                            echo $value;
                        ?>"
                >
            </div>
            <div class="form-group">
                <label for="job">Job</label>
                <input
                        type="text"
                        class="form-control"
                        id="job"
                        placeholder="Enter job"
                        name="job"
                        required
                        value="<?php
                        $personne? $value = $personne->job: $value= '';
                        echo $value;
                        ?>"
                >
            </div>
            <div class="custom-file">
                <label for="image">Image</label>
                <input
                        type="file"
                        class="custom-file-input"
                        id="image"
                        name="image"
                        required
                >
                <label class="custom-file-label"
                       for="image">Choose file</label>
            </div>

            <div class="form-group">
                <label for="section">Section</label>
                <select
                        required
                        name="section"
                        class="form-control select2" id="section">
                    <?=$personne->idSection?>
                    <option value="<?=$personne->idSection?>"><?php
                        $personne? $value = $personne->section: $value= '';
                        echo $value;
                        ?></option>
                    <?php
                    foreach ($sections as $section) {
                        ?>
                        <option value="<?= $section->id ?>">
                            <?= $section->designation ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                Edit Student
            </button>
        </form>
    </div>


<?php
include_once 'fragments/footer.php';
?>