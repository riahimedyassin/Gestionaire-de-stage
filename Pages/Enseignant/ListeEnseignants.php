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
    <title>Liste Enseignants</title>
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
        <h1>Liste Enseignant</h1>
        <a class="btn btn-success" href="/pages/Enseignant/AjoutEnseignant.php">Ajouter</a>
        </div>
        <table class="table table-striped  mt-4 text-center">
            <tr class="table-primary">
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Actions</th>
            </tr>
            <?php
            $donne = Enseignant::getAllTeachers();
            if (count($donne) == 0) {
                echo "<tr ><td colspan='5' ><h2 class='text-danger'>Pas d'etudiant ajouter</h2></td></tr>";
            } else {
                for ($i = 0; $i < count($donne); $i++) {
                    echo "<tr><td>" . $donne[$i]['matricule'] . "</td>";
                    echo "<td>" . $donne[$i]['nom'] . "</td>";
                    echo "<td>" . $donne[$i]['prenom'] . "</td>";
                    echo "<td> <a class='btn btn-warning'" . "href='ModifierEnseignant.php?id=" . $donne[$i]['matricule'] . "'" . ">Modifier</a> ";
                    echo "<a class='btn btn-danger'" . "href='SupprimerEnseignant.php?id=" . $donne[$i]['matricule'] . "'" . ">Supprimer</a></td> ";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>

</body>

</html>