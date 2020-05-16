<?php
require_once 'auth/isAuthenticated.php';
include_once 'fragments/header.php';
?>
<div class="jumbotron">
    <h1 class="display-3">Hello, <?= $_SESSION['user'] ?> </h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </p>
</div>
<?php
include_once 'fragments/footer.php';
?>
