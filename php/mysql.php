<?php
$host = "localhost";
$name = "db";
$user = "sqlware";
$passwort = '96$pPyFfqS/5xLc6';
try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
} catch (PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}
?>