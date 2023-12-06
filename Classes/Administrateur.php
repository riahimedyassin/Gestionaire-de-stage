<?php
session_start();
include __DIR__ . "/../connect/connect.php";

class Administrateur
{
    public static function login(string $email, string $password): bool
    {
        try {
            $res = self::getAdmin($email);
            
            if ($res == null)
                return false;
            $hashed = $res['mot_de_passe'];
            if (!password_verify($password,$hashed))
                return false;
            else {
                $_SESSION['ok'] = 'ok';
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $hashed;
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }
    public static function isAuth(): bool
    {
        if(!isset($_SESSION['email']) || !isset($_SESSION['password'])) return false ; 
        $email = $_SESSION['email'];
        $hashed = $_SESSION['password'];
        $res = self::getAdmin($email);
        return $hashed == $res['mot_de_passe'];
    }
    private static function getAdmin(string $email)
    {
        try {
            global $cnx;
            $query = "SELECT * FROM administrateur WHERE login=:login ";
            $stmnt = $cnx->prepare($query);
            $stmnt->bindParam(':login', $email);
            $stmnt->execute();
            $rowCount = $stmnt->rowCount();
            if ($rowCount == 0)
                return null;
            $res = $stmnt->fetch(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
        header('Location: /index.php');
        exit();
    }
    public static function isAdmin()
    {
        return self::isLoggedIn() && self::isAuth();
    }
    private static function isLoggedIn()
    {
        return isset($_SESSION['email']) && isset($_SESSION['password']);
    }
    public static function addAdmin(string $email, string $password)
    {
        try {
            global $cnx;
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO administrateur VALUES(:id,:email,:password)";
            $id = self::getLastAdminID()['last'] + 1;
            $stmnt = $cnx->prepare($query);
            $stmnt->bindParam(':email', $email);
            $stmnt->bindParam(':password', $hashed);
            $stmnt->bindParam(':id', $id);
            $stmnt->execute();
            $rowCount = $stmnt->rowCount();
            return $rowCount != 0;
        } catch (Exception $e) {
            return false;
        }
    }
    private static function getLastAdminID()
    {
        try {
            global $cnx;
            $query = "SELECT MAX(id_admin) AS 'last' FROM administrateur ";
            $stmnt = $cnx->query($query);
            $res = $stmnt->fetch(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $e) {
            return 0;
        }
    }
}
?>