<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    try{
    require_once "includes/dbconnection.php" ;
        if (empty($email) || empty($password)) {
            die("Email and Password are required.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format.");
        }
        $query = "select * from users where email = :email;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $result = $stmt->fetch();

        
        $pdo = null ;
        $stmt = null ;
        die();
        
    }catch(PDOException $e){
        header("Location: ../index.php");
        die("Query failed". $e->getMessage());
    }
}else{
    header("Location: ../index.php");
}
