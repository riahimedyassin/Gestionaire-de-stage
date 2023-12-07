<?php
include __DIR__ . "/../connect/connect.php";
class Soutenance
{

    public static function addSoutenance(string $numjury, string $date, string $etud, string $ens, string $note): bool
    {
        global $cnx;
        $query = "INSERT INTO soutenance VALUES(:numjury,:date_soutenance,:note,:nce,:matricule)";
        $stmnt = $cnx->prepare($query);
        $stmnt->bindParam('numjury', $numjury);
        $stmnt->bindParam('date_soutenance', $date);
        $stmnt->bindParam('nce', $etud);
        $stmnt->bindParam('matricule', $ens);
        $stmnt->bindParam('note', $note);
        $stmnt->execute();
        $rowCount = $stmnt->rowCount();
        return $rowCount != 0;
    }
    public static function searchSoutenance(string $matricule, string $date)
    {
        global $cnx;
        $qurey = "SELECT * FROM soutenance WHERE matricule=:matricule AND `date soutenance`=:dat";
        $stmnt = $cnx->prepare($qurey);
        $stmnt->bindParam(':matricule', $matricule);
        $stmnt->bindParam(':dat', $date);
        $stmnt->execute();
        $rowCount = $stmnt->rowCount();
        if ($rowCount == 0)
            return [];
        else {
            $donne = $stmnt->fetchAll(PDO::FETCH_ASSOC);
            return $donne;
        }
    }
    public static function getAllSoutenance()
    {
        global $cnx;
        try {
            $query = "SELECT * FROM soutenance";
            $stmnt = $cnx->prepare($query);
            $stmnt->execute();
            $res = $stmnt->fetchAll(PDO::FETCH_ASSOC);
            return $stmnt->rowCount() != 0 ? $res : [];
        } catch (Exception $e) {
            return [];
        }
    }
    public static function deleteSoutenance(int $numjury)
    {
        try {
            global $cnx;
            $query = "DELETE FROM soutenance WHERE numjury=:numjury";
            $stmnt = $cnx->prepare($query);
            $stmnt->bindParam(':numjury', $numjury);
            $stmnt->execute();
            $deleted = $stmnt->rowCount();
            return $deleted != 0;
        } catch (Exception $e) {
            return false;
        }
    }
    public static function getSingleSoutenance(string $numjury)
    {
        global $cnx;
        $query = "SELECT * FROM soutenance WHERE numjury=:id";
        $stmnt = $cnx->prepare($query);
        $stmnt->bindParam(':id', $numjury);
        $stmnt->execute();
        $rowCount = $stmnt->rowCount();
        if ($rowCount == 0)
            return null;
        else {
            $res = $stmnt->fetch(PDO::FETCH_ASSOC);
            return $res;
        }
    }
    public static function updateSoutenance(int $numjury, string $date, int $note)
    {
        try {
            global $cnx;
            $querry = "UPDATE soutenance SET note=:note , `date soutenance`=:date  WHERE numjury=:id";
            $stmnt = $cnx->prepare($querry);
            $stmnt->bindParam(':note', $note);
            $stmnt->bindParam(':date', $date);
            $stmnt->bindParam(':id', $numjury);
            $stmnt->execute();
            $rowCount = $stmnt->rowCount();
            if ($rowCount == 0)
                return false;
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}

?>