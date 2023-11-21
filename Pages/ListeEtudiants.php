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
    <table class="table">
        <tr class="table-secondary">
            <th>NCE</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Classe</th>
            <th>Action</th>
        </tr>
        <?php
        include "../connect/connect.php";
        $qurey = "SELECT * FROM etudiant" ;
        $stmnt = $cnx->query($qurey) ;
        while($donne = $stmnt->fetch(PDO::FETCH_ASSOC))  {
            echo "<tr><td>".$donne['nce']."</td>" ;
            echo "<td>".$donne['nom']."</td>";
            echo "<td>".$donne['prenom']."</td>";
            echo "<td>".$donne['classe']."</td>";
            echo "<td>
                <button class='btn btn-warning'>Modifier</button> 
                <button class='btn btn-danger'>Supprimer</button> 
            </td>";
            echo "</tr>" ;
        }
        ?>
    </table>
</div>

</body>
</html>