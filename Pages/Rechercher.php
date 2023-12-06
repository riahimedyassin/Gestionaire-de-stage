<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require_once "../Classes/Administrateur.php";
if (!Administrateur::isAdmin()) {
    Administrateur::logout();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher</title>
    <?php
    include "../Components/bootstrap.php";
    ?>
</head>

<body>
    <?php
    include "../Components/navbar.php";
    include "../Classes/Enseignant.php";
    include "../Classes/Soutenance.php";
    include "../Classes/Etudiant.php";
    ?>
    <div class="container mt-5">
        <h1>Checher une soutenance</h1>
        <form method="post">
            <label for="">Choisir un enseignat</label>
            <select class="form-select mb-4" name="enseignant">
                <?php
                $donne = $teacher_manager->getAllTeachers();
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
            $res = $soutenance_manager->searchSoutenance($matricule, $date);
            if (count($res) == 0)
                echo "<h1> Pas de soutenance </h1>";
            else {
                echo '<table class="table"><tr><th>Etudiant</th><th>Enseignant</th><th>Date</th><th>Note</th></tr>';
                for ($i = 0; $i < count($res); $i++) {
                    $teacher = $teacher_manager->getSingleTeacher($res[$i]['matricule']);
                    $etudiant = $etudiant_manager->getSingleStudent($res[$i]['nce']);
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