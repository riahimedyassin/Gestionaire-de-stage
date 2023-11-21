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
        <form method="post" name="frm" class="mt-5">
            <h1>Ajouter Enseignant</h1>
            <div class="mt-4">
                <input type="number" placeholder="Matricule d'enseignat" class="form-control" name="matricule" >
            </div>
            <div class="mt-4">
                <input type="text" placeholder="Nom d'enseignat" class="form-control" name="nom">
            </div>
            <div class="mt-4 mb-4">
                <input type="text" placeholder="Prenom d'enseignat" class="form-control" name="prenom" >
            </div>
            <button class="btn btn-success" name="submit" type="submit">Ajouter</button>
            <button class="btn btn-secondary" type="button" onclick="initFiels()">Reset</button>
        </form>
    </div>
<?php
    include "../connect/connect.php" ;
    if(isset($_POST['submit'])) {
        $name = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $matricule = $_POST['matricule'];
        $query = "INSERT INTO enseignant VALUES(:matricule,:nom,:prenom)";
        $stmnt = $cnx->prepare($query);
        $stmnt->bindParam('nom',$name);
        $stmnt->bindParam('prenom',$prenom);
        $stmnt->bindParam('matricule',$matricule);
        $nb = $stmnt->execute();
        if($nb!=0) echo "Ajout avec succés " ;
        else echo "Ajout echoué";
    }
?>

</body>
</html>