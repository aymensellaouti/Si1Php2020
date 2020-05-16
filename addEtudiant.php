<?php
require_once 'auth/isAuthenticated.php';
require_once 'getConnexion.php';

$req = "select * from section";
$response = $bdd->prepare($req);
$response->execute(array());
$sections = $response->fetchAll(PDO::FETCH_OBJ);

include_once 'fragments/header.php';
?>

    <div class="container mt-5">
        <form action="handleAddStudent.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="Enter name"
                        name="name"
                        required
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
                >
            </div>

            <div class="form-group">
                <label for="section">Section</label>
                <select
                        required
                        name="section"
                        class="form-control select2" id="section">
                    <?php
                    foreach ($sections as $section) {
                        ?>
                        <option value="<?= $section->id ?>"><?= $section->designation ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                Add Student
            </button>
        </form>
    </div>


<?php
include_once 'fragments/footer.php';
?>