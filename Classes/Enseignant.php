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
        try {
            $query = "SELECT * FROM enseignant WHERE matricule=:matricule";
            $stmnt = $cnx->prepare($query);
            $stmnt->bindParam(':matricule', $matricule);
            $stmnt->execute();
            $rowCount = $stmnt->rowCount();
            if ($rowCount != 0) {
                $res = $stmnt->fetch(PDO::FETCH_ASSOC);
                return $res;
            }
            return null;
        } catch (Exception $e) {
            return null;
        }
    }
    public static function updateTeacher(string $matricule, string $nom, string $prenom)
    {
        global $cnx;
        try {
            $query = "UPDATE enseignant SET nom=:nom , prenom=:prenom WHERE matricule=:matricule";
            $stmnt = $cnx->prepare($query);
            $stmnt->bindParam(':nom', $nom);
            $stmnt->bindParam(':prenom', $prenom);
            $stmnt->bindParam(':matricule', $matricule);
            $stmnt->execute();
            $rowCount = $stmnt->rowCount();
            return $rowCount != 0;
        } catch (Exception $e) {
            return false;
        }
    }
    public static function deleteTeacher(string $matricule)
    {
        global $cnx;
        try {
            $query = "DELETE FROM enseignant WHERE matricule=:matricule";
            $stmnt = $cnx->prepare($query);
            $stmnt->bindParam("matricule", $matricule);
            $stmnt->execute();
            $rowCount = $stmnt->rowCount();
            if ($rowCount != 0)
                return true;
            return false;

        } catch (Exception $e) {
            return false;
        }
    }
}


?>