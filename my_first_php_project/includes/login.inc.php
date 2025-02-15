<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){ //if they are equal that's mean user get here correctly
    
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    

    try{
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";
        require_once "config_session.inc.php";
        //ERROR HANDLET
        $errors =[];
        if(is_input_empty( $email, $pwd)){
            $errors["empty_input"] = "Fill in all fileds!";
        }

        $result = get_email_for_login($pdo,$email);

        if(is_email_wrong($result)){
            $errors["wrong_email"] = "Email is not exist!";
        }
        if(is_password_wrong($pwd, $result["pwd"])){
            $errors["wrong_password"] = "Wrong password!";
        }

        if($errors){
            $_SESSION["login_errors"] = $errors;
            header("Location: ../index.php");
            die();
        }
        $user = get_user($pdo, $email);
        $_SESSION["user_email"] = $user["email"];
        $_SESSION["user_role"] = $user["role"];
        
        redirection($pdo, $user["role"]);
        $pdo = null;
        $stmt = null;
        die();
    }catch(PDOException $e){
        die("Query Failed" . $e->getMessage()); //terminate the script if something goes wrong and printing out the quiry failed
    }
}else{ //if they didn't get here correctly(by manipulating the url) we have to send them back to the front page
    header("Location: ../index.php");
    die(); //if there any script is running we should terminate it
}

