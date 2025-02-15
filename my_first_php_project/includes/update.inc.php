<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $userId = $_GET["id"];
    $name = $_POST['name'] ?? "";
    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";
    $confirm_password = $_POST['confirm_password'] ?? "";
    $role = $_POST["role"];
    $address = $_POST["address"] ?? "";
    $phone = $_POST["phone"] ?? "";
    var_dump($password);
    try{
        require_once "dbh.inc.php";
        require_once "update_model.inc.php";
        require_once "update_contr.inc.php";
        require_once "config_session.inc.php";
        $errors =[];
        if(!empty($email)){
            if(is_email_invalid($email)){
                $errors["invalid_email"] = "Invalid email used!";
            }
        
            if(is_email_registered($pdo, $email)){
                $errors["email_used"] = "Email is already registered!";
            }
        }
        //testing
        //  var_dump(  $password);
        //  die();
        if(!empty($password) && !empty($confirm_password)){
            if(password_mismatch($password, $confirm_password)){
                $errors["password_match"] = "Entered password does not match confirmed one!";
            }
        }
        if($errors){
            $_SESSION["update_errors"] = $errors;
            header("Location: ../update_user.php?id=" . $userId. "&update=failed");
            die();
        }
        edit_user($pdo, $name, $email, $password, $role, $address, $phone, $userId);
        header("Location: ../update_user.php?id=" . $userId . "&update=success");
    }catch(PDOException $e){
        die("Query Failed" . $e->getMessage());
    }
}else{
    header("Location: ../update_user.php");
    die();
}
