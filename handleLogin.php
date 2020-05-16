<?php
require_once 'auth/isAuthenticated.php';
/*
 * Vérfier si on a le username et le pwd en POST
 * si non on redirige vers login
 * si oui
 *  On se connecte à la base de données
 *      On vérifie s'il y a un user avec  ses credentials
 *      Si oui
 *         ajouter les infos nécessaires à la session
 *         on redirige vers l'espace
 *      si non
 *          on redirige vers login avec message d'erreur
 * */
//* Vérfier si on a le username et le pwd en POST
if (isset($_POST['username'])&&isset($_POST['password'])) {
    // On se connecte à la base de données
    require_once 'getConnexion.php';
    // On vérifie s'il y a un user avec  ses credentials
    $req = "select * from user where username = :username and password = :pwd";
    $reponse = $bdd->prepare($req);
    $reponse->execute(array(
       'username' => $_POST['username'],
       'pwd' => $_POST['password']
    ));
    $user = $reponse->fetch(PDO::FETCH_OBJ);
        //    Si oui
        //    *         ajouter les infos nécessaires à la session
        //    *         on redirige vers l'espace
    if ($user) {
        $_SESSION['user'] = $user->username;
        $_SESSION['role'] = $user->role;
        $_SESSION['success'] = "Bienvenu ${_SESSION['username']}";
        header('location:home.php');
    } else /*Bad Credentials*/ {
        $_SESSION['errorLogin'] = "Veuillez vérifier vos credentials";
        header('location:login.php');
    }
} else /*Si pas de post*/ {
    header('location:login.php');
}