<?php
include "../connect/connect.php";
class Soutenance
{

    public function addSoutenance(string $numjury, string $date, string $etud, string $ens, string $note): bool
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
    public function searchSoutenance(string $matricule, string $date)
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

}
$soutenance_manager = new Soutenance();

?>