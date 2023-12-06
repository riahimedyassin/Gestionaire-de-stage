<?php
require_once "../../auth/requireAuth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher</title>
    <?php
    include "../../utils/bootstrap.php";
    ?>
</head>

<body>
    <?php
    include "../../Components/navbar.php";
    require_once "../../Classes/Enseignant.php";
    require_once "../../Classes/Soutenance.php";
    require_once "../../Classes/Etudiant.php";
    ?>
    <div class="container mt-5">
        <h1>Checher une soutenance</h1>
        <form method="post">
            <label for="">Choisir un enseignat</label>
            <select class="form-select mb-4" name="enseignant">
                <?php
                $donne = Enseignant::getAllTeachers();
                for ($i = 0; $i < count($donne); $i++) {
                    echo "<option value=." . $donne[$i]['matricule'] . ".>" . $donne[$i]['nom'] . " " . $donne[$i]['prenom'] . " </option>";
                }
                ?>
            </select>
            <label for="">Choisir une date</label>
            <input type="date" class="form-control" name="date">
            <button class="btn btn-primary mt-4" name="submit">Affichier</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $matricule = $_POST['enseignant'];
            $date = $_POST['date'];
            $res = Soutenance::searchSoutenance($matricule, $date);
            if (count($res) == 0)
                echo "<h1> Pas de soutenance </h1>";
            else {
                echo '<table class="table"><tr><th>Etudiant</th><th>Enseignant</th><th>Date</th><th>Note</th></tr>';
                for ($i = 0; $i < count($res); $i++) {
                    $teacher = Enseignant::getSingleTeacher($res[$i]['matricule']);
                    $etudiant = Etudiant::getSingleStudent($res[$i]['nce']);
                    echo "<tr>";
                    echo "<td>" . $etudiant['nom'] . "</td>";
                    echo "<td>" . $teacher['nom'] . "</td>";
                    echo "<td>" . $res[$i]['date soutenance'] . "</td>";
                    echo "<td>" . $res[$i]['note'] . "</td>";
                    echo "</tr>";
                }
                echo '</table> ';
            }
        }

        ?>
    </div>
</body>

</html>