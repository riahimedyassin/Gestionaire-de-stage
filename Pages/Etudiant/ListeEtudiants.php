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
    <title>Liste Etudiants</title>
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
        <h1>Liste Etudiant</h1>
        <a class="btn btn-success" href="/pages/Etudiant/ajoutetudiant.php">Ajouter</a>
        </div>
        <table class="table table-striped  mt-4 text-center">
            <tr class="table-primary">
                <th>NCE</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Classe</th>
                <th>Action</th>
            </tr>
            <?php
            $donne = Etudiant::getAllStudents();
            if (count($donne) == 0) {
                echo "<tr ><td colspan='5' ><h2 class='text-danger'>Pas d'etudiant ajouter</h2></td></tr>";
            } else {
                for ($i = 0; $i < count($donne); $i++) {
                    echo "<tr><td>" . $donne[$i]['nce'] . "</td>";
                    echo "<td>" . $donne[$i]['nom'] . "</td>";
                    echo "<td>" . $donne[$i]['prenom'] . "</td>";
                    echo "<td>" . $donne[$i]['classe'] . "</td>";
                    echo "<td> <a class='btn btn-warning'" . "href='ModifierEtudiant.php?id=" . $donne[$i]['nce'] . "'" . ">Modifier</a> ";
                    echo "<a class='btn btn-danger'" . "href='SupprimerEtudiant.php?id=" . $donne[$i]['nce'] . "'" . ">Supprimer</a></td> ";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>

</body>

</html>