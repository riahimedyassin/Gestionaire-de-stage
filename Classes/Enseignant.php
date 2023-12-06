<?php
include __DIR__ . "/../connect/connect.php";

class Enseignant
{

    public static function getAllTeachers()
    {
        global $cnx;
        $querry = "SELECT * FROM enseignant";
        $res = $cnx->query($querry);
        $donne = $res->fetchAll(PDO::FETCH_ASSOC);
        return count($donne) != 0 ? $donne : [];
    }
    public static function addTeacher(int $matricule, string $name, string $prenom): bool
    {
        global $cnx;
        $query = "INSERT INTO enseignant VALUES(:matricule,:nom,:prenom)";
        $stmnt = $cnx->prepare($query);
        $stmnt->bindParam('nom', $name);
        $stmnt->bindParam('prenom', $prenom);
        $stmnt->bindParam('matricule', $matricule);
        $stmnt->execute();
        $rowCount = $stmnt->rowCount();
        return $rowCount != 0;
    }
    public static function getSingleTeacher(string $matricule)
    {
        global $cnx;
        $query = "SELECT * FROM enseignant WHERE matricule=:matricule";
        $stmnt = $cnx->prepare($query);
        $stmnt->bindParam(':matricule', $matricule);
        $stmnt->execute();
        $res = $stmnt->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
}


?>