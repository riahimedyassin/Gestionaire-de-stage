<?php

include __DIR__ . "/../connect/connect.php";
class Etudiant
{
    public static function getSingleStudent(int $nce)
    {
        global $cnx;
        $query = "SELECT * FROM etudiant WHERE nce=:id";
        $stmnt = $cnx->prepare($query);
        $stmnt->bindParam(':id', $nce);
        $stmnt->execute();
        $rowCount = $stmnt->rowCount();
        if ($rowCount == 0)
            return null;
        else {
            $res = $stmnt->fetch(PDO::FETCH_ASSOC);
            return $res;
        }
    }
    public static function getAllStudents()
    {
        global $cnx;
        $query = "SELECT * FROM etudiant";
        $res = $cnx->query($query);
        if ($res)
            return $res->fetchAll(PDO::FETCH_ASSOC);
        else
            return [];
    }
    public static function updateStudent(int $nce, string $nom, string $prenom, string $classe)
    {
        global $cnx;
        $querry = "UPDATE etudiant SET nom=:nom , prenom=:prenom ,  classe=:classe WHERE nce=:id";
        $stmnt = $cnx->prepare($querry);
        $stmnt->bindParam(':nom', $nom);
        $stmnt->bindParam(':prenom', $prenom);
        $stmnt->bindParam(':classe', $classe);
        $stmnt->bindParam(':id', $nce);
        $stmnt->execute();
        $rowCount = $stmnt->rowCount();
        if ($rowCount == 0)
            return false;
        return true;
    }
    public static function addStudent(int $nce, string $nom, string $prenom, string $classe)
    {
        global $cnx;
        $query = "INSERT INTO etudiant VALUES(:nce,:nom,:prenom,:class)";
        $stmnt = $cnx->prepare($query);
        $stmnt->bindParam('nom', $nom);
        $stmnt->bindParam('prenom', $prenom);
        $stmnt->bindParam('class', $classe);
        $stmnt->bindParam('nce', $nce);
        $stmnt->execute();
        $rowCount = $stmnt->rowCount();
        if ($rowCount == 0)
            return false;
        return true;
    }
    public static function deleteStudent(int $nce)
    {
        global $cnx;
        $query = "DELETE FROM etudiant WHERE nce=:id";
        $stmnt = $cnx->prepare($query);
        $stmnt->bindParam(':id', $nce);
        $stmnt->execute();
        $deleted = $stmnt->rowCount();
        return $deleted != 0;
    }
}


?>