<?php
include "../Classes/Administrateur.php";
$email = $_GET['email'];
$password = $_GET['password'];
if (!isset($email) || !isset($password)) {
    header('location: ../index.php');
    exit();
}
$res = Administrateur::login($email, $password);
if ($res) {
    header('Location: ListeEtudiants.php');
    exit();
} else {
    header('location: ../index.php');
    echo '<div class="alert alert-danger"> Invalid Email or Password </div>';
}

?>