<?php
    require_once "../Classes/Administrateur.php"; 
    session_start();
    if(!$admin_manager->isAdmin()) {
        $admin_manager->logout();
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