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
    <title>Liste Soutenances</title>
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
            <h1>Liste Soutenances</h1>
            <div>
                <a class="btn btn-success" href="/pages/Soutenance/AjoutSoutenance.php">Ajouter</a>
                <a class="btn btn-primary" href="/pages/Soutenance/RechercherSoutenance.php">Rechercher</a>

            </div>

        </div>
        <table class="table table-striped  mt-4 text-center">
            <tr class="table-primary">
                <th>Etudiant</th>
                <th>Enseignant</th>
                <th>Date</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
            <?php
            $res = Soutenance::getAllSoutenance();
            if (count($res) == 0) {
                echo "<tr ><td colspan='5' ><h2 class='text-danger'>Pas de soutenance ajouter</h2></td></tr>";
            } else {
                for ($i = 0; $i < count($res); $i++) {
                    $teacher = Enseignant::getSingleTeacher($res[$i]['matricule']);
                    $etudiant = Etudiant::getSingleStudent($res[$i]['nce']);
                    echo "<tr>";
                    echo "<td>" . $etudiant['nom'] . " " . $etudiant['prenom'] . "</td>";
                    echo "<td>" . $teacher['nom'] . " " . $teacher['prenom'] . "</td>";
                    echo "<td>" . $res[$i]['date soutenance'] . "</td>";
                    echo "<td>" . $res[$i]['note'] . "</td>";
                    echo "<td> <a class='btn btn-warning'" . "href='ModifierSoutenance.php?id=" . $res[$i]['numjury'] . "'" . ">Modifier</a> ";
                    echo "<a class='btn btn-danger'" . "href='SupprimerSoutenance.php?id=" . $res[$i]['numjury'] . "'" . ">Supprimer</a></td> ";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>

</body>

</html>