<?php
require_once "../../auth/requireAuth.php";
?>
<?php
require_once "../../utils/imports.php";
$numjury = $_GET['id'];
$res = Soutenance::deleteSoutenance($numjury);
if ($res)
    header('Location: /pages/Soutenance/ListeSoutenances.php');
else
    echo "<h1> Cannot delete Soutenance </h1>";
?>