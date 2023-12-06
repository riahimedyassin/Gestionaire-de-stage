<?php
require_once "../../auth/requireAuth.php";
?>
<?php
require_once "../../Classes/Etudiant.php";
$nce = $_GET['id'];
$res = Etudiant::deleteStudent($nce);
if ($res)
    header('Location: /pages/Etudiant/ListeEtudiants.php');
else
    echo "<h1> Cannot delete student </h1>";

?>