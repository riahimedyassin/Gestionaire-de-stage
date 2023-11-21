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
include "../connect/connect.php" ;
include "../Components/navbar.php";
?>
<div class="container">
    <form method="post" name="frm" class="mt-5">
        <h1>Ajouter Soutenance</h1>
        <div class="mt-4">
            <input type="number" placeholder="Numero Jury" class="form-control" name="numjury" >
        </div>
        <div class="mt-4">
            <input type="date" placeholder="Date soutenance" class="form-control" name="date">
        </div>
        <div class="mt-4 ">
            <input type="number" placeholder="Note de soutenance" class="form-control" name="note" >
        </div>
        <label class="mt-4">Choisir l'etudiant</label>
        <select class="form-select" name="etudiant">
            <?php
            $querry = "SELECT * FROM etudiant";
            $res = $cnx->query($querry);
            while($donne = $res->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=.".$donne['nce'].".>".$donne['nom']." ".$donne['prenom']." </option>";
            }
            ?>
        </select>
        <label class="mt-4">Choisir l'enseignant</label>
        <select class="form-select mb-4" name="enseignant">
            <?php
            $querry = "SELECT * FROM enseignant";
            $res = $cnx->query($querry);
            while($donne = $res->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=.".$donne['matricule'].".>".$donne['nom']." ".$donne['prenom']." </option>";
            }
            ?>
        </select>
        <button class="btn btn-success" type="submit" name="submit">Ajouter</button>
        <button class="btn btn-secondary" onclick="initFiels()" type="button">Reset</button>
    </form>
</div>

<?php
    if(isset($_POST['submit'])) {
        $ens = $_POST['enseignant'] ;
        $etud = $_POST['etudiant'] ;
        $numjury=$_POST['numjury'];
        $date = $_POST['date'];
        $note = $_POST['note'];
        $query = "INSERT INTO soutenance VALUES(:numjury,:date_soutenance,:note,:nce,:matricule)" ;
        $stmnt = $cnx->prepare($query);
        $stmnt->bindParam('numjury',$numjury);
        $stmnt->bindParam('date_soutenance',$date);
        $stmnt->bindParam('nce',$etud);
        $stmnt->bindParam('matricule',$ens);
        $stmnt->bindParam('note',$note);
        $nb = $stmnt->execute();
        if($nb!=0) echo "Ajout avec success";
        else echo "Ajout echoué";

    }
?>
</body>
</html>