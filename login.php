<?php
session_start();
if (isset($_SESSION['user'])) {
    header('location:home.php');
}
include_once 'fragments/header.php';

if (isset($_SESSION['errorLogin'])) {
    ?>

<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <strong class="mr-auto">Login Error</strong>
        <small>Error</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span id="close" aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        <?= $_SESSION['errorLogin'] ?>>
    </div>
</div>

<?php
    unset($_SESSION['errorLogin']);
    }
 ?>
<div class="container mt-4">
    <form action="handleLogin.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input
                type="text"
                class="form-control"
                id="username"
                aria-describedby="emailHelp"
                placeholder="Enter username"
                name="username"
            >
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input
                type="password"
                class="form-control"
                id="password"
                placeholder="Enter password"
                name="password"
            >
        </div>
        <button
            type="submit"
            class="btn btn-primary">
            Login
        </button>
    </form>

</div>

<script src="assets/js/login.js" "></script>
<?php
include_once 'fragments/footer.php';
?>
