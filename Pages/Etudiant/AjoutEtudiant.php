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
    ?>
    <div class="container">
        <form method="post" name="frm" class="mt-5">
            <h1>Ajouter Etudiant</h1>
            <div class="mt-4">
                <input type="number" placeholder="NCE D'etudiant" class="form-control" name="nce" required>
            </div>
            <div class="mt-4">
                <input type="text" placeholder="Nom d'etudiant" class="form-control" name="nom" required>
            </div>
            <div class="mt-4 mb-4">
                <input type="text" placeholder="Prenom d'etudiant" class="form-control" name="prenom" required>
            </div>
            <div class="mt-4 mb-4">
                <input type="text" placeholder="Class d'etudiant" class="form-control" name="class" required>
            </div>
            <button class="btn btn-success" name="submit" type="submit">Ajouter</button>
            <button class="btn btn-secondary" type="button" onclick="initFiels()">Reset</button>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $class = $_POST['class'];
        $nce = $_POST['nce'];
        $res = Etudiant::addStudent($nce, $name, $prenom, $class);
        if ($res == true)
            echo "<h2>Ajout avec succés</h2> ";
        else
            echo "<h2>Ajout echoué</h2>";
    }



    ?>
</body>

</html>