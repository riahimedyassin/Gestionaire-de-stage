<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require_once __DIR__."/../Classes/Administrateur.php";
if (!Administrateur::isAdmin()) {
    Administrateur::logout();
} else {
?>
<?php
}
?>