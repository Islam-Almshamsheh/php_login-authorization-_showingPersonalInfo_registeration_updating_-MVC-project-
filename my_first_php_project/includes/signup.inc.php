<?php

if($_SERVER["REQUEST_METHOD"] === "POST" ){ //if they are equal that's mean user get here correctly
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $role = $_POST["role"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    try{
        //following MVC pattren
        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        //the order is important model then view then contr in this case we dont need the view
        require_once "signup_contr.inc.php";
        require_once "config_session.inc.php";
        //ERROR HANDLERS
        //we would not rely on JS CSS OR HTML in making thing required casuse there's no level of security using them
        $errors =[];
        if(is_input_empty($name, $email, $pwd, $confirm_password)){
            $errors["empty_input"] = "Fill in all fileds!";
        }
        if(is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid email used!";
        }
        if(password_mismatch($pwd, $confirm_password)){
            $errors["password_match"] = "Entered password does not match confirmed one!";
        }
        if(is_email_registered($pdo, $email)){
            $errors["email_used"] = "Email is already registered!";
        }
        
        if($errors){
            $_SESSION["signup_errors"] = $errors;
            header("Location: ../register.php");
            die();
        }
        
        create_user($pdo, $name, $email , $pwd, $role, $address, $phone);
        header("Location: ../data_dashboard.php?create_user=success");
        $pdo = null;
        $stmt = null;
        die();
    }catch(PDOException $e){
        die("Query Failed" . $e->getMessage()); //terminate the script if something goes wrong
    }
    
    
}else{ //if they didn't get here correctly(by manipulating the url) we have to send them back to the front page
    header("Location: ../index.php");
    die(); //if there any script is running we should terminate it
}
