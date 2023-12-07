<?php
require_once "../../auth/requireAuth.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste Admins</title>
    <?php
    include "../../utils/bootstrap.php";
    ?>
</head>

<body>
    <?php
    include "../../Components/navbar.php";
    require_once "../../utils/imports.php";
    ?>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
        <h1>Liste Admins</h1>
        <a class="btn btn-success" href="/pages/Admin/AjoutAdmin.php">Ajouter</a>
        </div>
        <table class="table table-striped  mt-4 text-center">
            <tr class="table-primary">
                <th>ID</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
            $donne = Administrateur::getAllAdmins();
            if (count($donne) == 0) {
                echo "<tr ><td colspan='5' ><h2 class='text-danger'>Pas d'etudiant ajouter</h2></td></tr>";
            } else {
                for ($i = 0; $i < count($donne); $i++) {
                    echo "<tr><td>" . $donne[$i]['id_admin'] . "</td>";
                    echo "<td>" . $donne[$i]['login'] . "</td>";
                    echo "<td><a class='btn btn-danger'" . "href='SupprimerAdmin.php?id=" . $donne[$i]['id_admin'] . "'" . ">Supprimer</a></td> ";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>

</body>

</html>