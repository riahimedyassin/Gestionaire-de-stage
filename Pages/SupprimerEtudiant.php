<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require_once "../Classes/Administrateur.php";
if (!Administrateur::isAdmin()) {
    Administrateur::logout();
}
?>
<?php
include "../Classes/Etudiant.php";
$nce = $_GET['id'];
$res = $etudiant_manager->deleteStudent($nce);
if ($res)
    header('Location: /pages/ListeEtudiants.php');
else
    echo "<h1> Cannot delete student </h1>";

?>