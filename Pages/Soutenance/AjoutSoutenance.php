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
    <title>Document</title>
    <?php
    include "../../utils/bootstrap.php";
    ?>
</head>

<body>
    <?php
    include "../../Components/navbar.php";
    require_once "../../Classes/Etudiant.php";
    require_once "../../Classes/Enseignant.php";
    require_once "../../Classes/Soutenance.php";
    ?>
    <div class="container">
        <form method="post" name="frm" class="mt-5">
            <h1>Ajouter Soutenance</h1>
            <div class="mt-4">
                <input type="number" placeholder="Numero Jury" class="form-control" name="numjury">
            </div>
            <div class="mt-4">
                <input type="date" placeholder="Date soutenance" class="form-control" name="date">
            </div>
            <div class="mt-4 ">
                <input type="number" placeholder="Note de soutenance" class="form-control" name="note">
            </div>
            <label class="mt-4">Choisir l'etudiant</label>
            <select class="form-select" name="etudiant">
                <?php
                $donne = Etudiant::getAllStudents();
                for ($i = 0; $i < count($donne); $i++) {
                    echo '<option value="' . $donne[$i]['nce'] . '" >' . $donne[$i]['nom'] . ' ' . $donne[$i]['prenom'] . "</option>";
                }
                ?>
            </select>
            <label class="mt-4">Choisir l'enseignant</label>
            <select class="form-select mb-4" name="enseignant">
                <?php
                
                $donne = Enseignant::getAllTeachers();
                for ($i = 0; $i < count($donne); $i++) {
                    echo "<option value=." . $donne[$i]['matricule'] . ".>" . $donne[$i]['nom'] . " " . $donne[$i]['prenom'] . " </option>";
                }
                ?>
            </select>
            <button class="btn btn-success" type="submit" name="submit">Ajouter</button>
            <button class="btn btn-secondary" onclick="initFiels()" type="button">Reset</button>
        </form>
    </div>

    <?php
   
    if (isset($_POST['submit'])) {
        $ens = $_POST['enseignant'];
        $etud = $_POST['etudiant'];
        $numjury = $_POST['numjury'];
        $date = $_POST['date'];
        $note = $_POST['note'];
        $res = Soutenance::addSoutenance($numjury, $date, $etud, $ens, $note);
        echo $res ? "<h1>Ajout avec success</h1>" : "<h1>Ajout echoué</h1>";
    }
    ?>
</body>

</html>