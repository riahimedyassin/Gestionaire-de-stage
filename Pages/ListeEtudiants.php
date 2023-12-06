<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
    include "../Components/bootstrap.php";
    ?>
</head>

<body>
    <?php
    include "../Components/navbar.php";
    ?>
    <div class="container">
        <h1>Liste etudiant</h1>
        <table class="table table-striped table-bordered">
            <tr class="table-secondary">
                <th>NCE</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Classe</th>
                <th>Action</th>
            </tr>
            <?php
            include "../Classes/Etudiant.php";
            $donne = $etudiant_manager->getAllStudents();
            for ($i = 0; $i < count($donne); $i++) {
                echo "<tr><td>" . $donne[$i]['nce'] . "</td>";
                echo "<td>" . $donne[$i]['nom'] . "</td>";
                echo "<td>" . $donne[$i]['prenom'] . "</td>";
                echo "<td>" . $donne[$i]['classe'] . "</td>";
                echo "<td> <a class='btn btn-warning'" . "href='ModifierEtudiant.php?id=" . $donne[$i]['nce'] . "'" . ">Modifier</a> ";
                echo "<a class='btn btn-danger'" . "href='SupprimerEtudiant.php?id=" . $donne[$i]['nce'] . "'" . ">Supprimer</a></td> ";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

</body>

</html>