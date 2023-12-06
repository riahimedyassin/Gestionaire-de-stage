<?php
require_once(__DIR__ . '/../connect/dbconfig.php');
try {

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $err) {
    echo $err;
}
