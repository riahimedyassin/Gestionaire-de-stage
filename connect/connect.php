<?php
    include "./connect/dbconfig.php";
   try {

       $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username,$password);
   }
   catch (PDOException $err) {
        echo $err ;
}
