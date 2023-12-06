<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mofier Etudiant</title>
    <?php
    include '../Components/bootstrap.php';
    ?>
</head>

<body>
    <?php
    include '../Components/navbar.php';
    include "../Classes/Etudiant.php";
    ?>
    <div class="container mt-5">
        <form method="POST">
            <?php

            $res = $etudiant_manager->getSingleStudent($_GET['id']);
            if ($res == null)
                header('Location : pages/ListeEtudiants.php');
            else {
                echo '<h1> Etudiant : ' . $res['nom'] . " " . $res['prenom'] . "</h1>";
                echo "<label>Nom etudiant</label>";
                echo '<input type="text" class="form-control" name="nom" value="' . $res['nom'] . '" />';
                echo "<label>Prenom etudiant</label>";
                echo '<input type="text" class="form-control" name="prenom" value="' . $res['prenom'] . '" />';
                echo "<label>Classe etudiant</label>";
                echo '<input type="text" class="form-control" name="classe" value="' . $res['classe'] . '" />';
            }
            ?>
            <button class="btn btn-success mt-4" type="submit" name="submit">Save</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $classe = $_POST['classe'];
            $nce = $_GET['id'];
            $res = $etudiant_manager->updateStudent($nce, $nom, $prenom, $classe);
            echo $res ? "<h1> Changed Successfully </h1>" : "<h1> Cannot save </h1>" ; 
        }
        ?>
    </div>


</body>

</html>