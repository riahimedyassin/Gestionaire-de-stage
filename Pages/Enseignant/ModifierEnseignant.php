<?php
require_once "../../auth/requireAuth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Etudiant</title>
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

            $res = Enseignant::getSingleTeacher($_GET['id']);
            if ($res == null)
                header('Location : pages/ListeEtudiants.php');
            else {
                echo '<h1> Enseignant : ' . $res['nom'] . " " . $res['prenom'] . "</h1>";
                echo "<label>Nom enseignant</label>";
                echo '<input type="text" class="form-control" name="nom" value="' . $res['nom'] . '" />';
                echo "<label>Prenom enseignant</label>";
                echo '<input type="text" class="form-control" name="prenom" value="' . $res['prenom'] . '" />';
            }
            ?>
            <div class="d-flex align-items-center gap-4 mt-4">
                <button class="btn btn-success " type="submit" name="submit">Save</button>
                <!-- <?php
                echo "<a class='btn btn-danger'" . "href='SupprimerEnseignant.php?id=" . $res['nce'] . "'" . ">Supprimer</a></td> ";
                ?> -->
            </div>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $matricule = $_GET['id'];
            $res = Enseignant::updateTeacher($matricule, $nom, $prenom);
            echo $res ? "<h1> Changed Successfully </h1>" : "<h1> Cannot save </h1>";
        }
        ?>
    </div>


</body>

</html>