<?php
require_once "../../auth/requireAuth.php";
?>
<?php
require_once "../../utils/imports.php";
$matricule = $_GET['id'];
$res = Enseignant::deleteTeacher($matricule);
if ($res)
    header('Location: /pages/Enseignant/ListeEnseignants.php');
else
    echo "<h1> Cannot delete teacher </h1>";
?>