<?php

//LOCAL HOST CONNECTION
// $host = '127.0.0.1';
// $db = 'attendance_db';
// $user = 'root';
// $pass = '';
// $charset = 'utf8mb4';



$host = 'applied-web.mysql.database.azure.com';
$db = 'attendee_dwayne_whitely';
$user = 'appliedweb_user@applied-web';
$pass = 'P@ssword1';
$charset = 'utf8mb4';


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    //echo 'Sync with Database';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
    throw new PDOException($e->getMessage());
}
require_once 'crud.php';
require_once 'user.php'; //for login in the user 
$crud = new crud($pdo); //create a new instance of crud
$user = new user($pdo);
    
    
$user->insertUser("admin","password");

?>