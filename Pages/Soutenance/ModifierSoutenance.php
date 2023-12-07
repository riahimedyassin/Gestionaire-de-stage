<?php
require_once "../../auth/requireAuth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Soutenance</title>
    <?php
    include "../../utils/bootstrap.php";
    ?>
</head>

<body>
    <?php
    include '../../Components/navbar.php';
    require_once "../../utils/imports.php";
    ?>
    <div class="container mt-5">
        <form method="POST">
            <?php
            $res = Soutenance::getSingleSoutenance($_GET['id']);
            if ($res == null)
                header('Location: pages/Soutenance/ListeSoutenance.php');
            else {
                $teacher = Enseignant::getSingleTeacher($res['matricule']);
                $etudiant = Etudiant::getSingleStudent($res['nce']);
                echo '<h1> Soutenance Numero : ' . $res['numjury'] . "</h1>";
                echo '<input type="text" disabled  class="form-control mt-4" value="' . $etudiant['nom'] . $etudiant['prenom'] . '" /> ';
                echo '<input type="text" disabled class="form-control mt-4" value="' . $teacher['nom'] . $teacher['prenom'] . '" /> ';
                echo '<input type="date" name="date" class="form-control  mt-4" value="' . $res['date soutenance'] . '" /> ';
                echo '<input type="number" name="note" class="form-control mt-4" value="' . $res['note'] . '" />';
            }
            ?>
            <div class="d-flex align-items-center gap-4 mt-4">
                <button class="btn btn-success " type="submit" name="submit">Save</button>
                <?php
                echo "<a class='btn btn-danger'" . "href='SupprimerSoutenance.php?id=" . $res['numjury'] . "'" . ">Supprimer</a></td> ";
                ?>
            </div>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $note = $_POST['note'];
            $date = $_POST['date'];
            $numjury = $_GET['id'];
            $res = Soutenance::updateSoutenance($numjury, $date, $note);
            echo $res ? "<h1> Changed Successfully </h1>" : "<h1> Cannot save </h1>";
        }
        ?>
    </div>


</body>

</html>