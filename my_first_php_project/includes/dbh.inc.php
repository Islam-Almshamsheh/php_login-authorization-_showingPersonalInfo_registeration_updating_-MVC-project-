<?php
$username = "root";
$dbpassword = "123";
$port = "3307";
$dbname = "auth";
$host = "localhost";

try{
$pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $dbpassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Connection Failed" . $e->getMessage()); //terminate the script if something goes wrong
}
