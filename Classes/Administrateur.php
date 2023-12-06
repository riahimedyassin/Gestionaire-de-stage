<?php
include __DIR__ . "/../connect/connect.php";
class Administrateur
{
    public function login(string $email, string $password): bool
    {
        global $cnx;
        $query = "SELECT * FROM administrateur WHERE login=:login AND mot_de_passe=:password";
        $stmnt = $cnx->prepare($query);
        $stmnt->bindParam(':login', $email);
        $stmnt->bindParam(':password', $password);
        $stmnt->execute();
        $rowCount = $stmnt->rowCount();
        if ($rowCount == 0)
            return false;
        else {
            $res = $stmnt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['ok'] = 'ok';
            $_SESSION['email'] = $res['login'];
            $_SESSION['password'] = $res['mot_de_passe'];
            return true;
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: /index.php');
        exit();
    }
    public function isAdmin()
    {
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        return $this->isLoggedIn() && $this->login($email, $password);
    }
    public function isLoggedIn()
    {
        return isset($_SESSION['email']) && isset($_SESSION['password']);
    }

}
$admin_manager = new Administrateur();


?>