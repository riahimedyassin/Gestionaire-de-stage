<?php
require_once "../../auth/requireAuth.php";
?>
<?php
require_once "../../utils/imports.php";
$id_admin = $_GET['id'];
$current = $_SESSION['email'];
$toDelete = Administrateur::getSingleAdmin($id_admin);
$res = Administrateur::deleteAdmin($id_admin);
if ($res) {
    if ($current == $toDelete['login']) {
        Administrateur::logout();
    } else {
        header('location: /pages/admin/ListeAdmins.php');
    }
}



?>