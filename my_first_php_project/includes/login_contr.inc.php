<?php

function is_input_empty( string $email, string $pwd)
{
    if(empty($email) || empty($pwd)){
        return true;
    }else{
        return false;
    }
}
function is_email_wrong(bool|array $result) //get_email function will return ethier array or boolean
{
    //not having a value then yes the email is wrong
    if(!$result){//get array so we have value
        return true;
    }else{
        return false;
    }
}
function is_password_wrong(string $pwd, string|null $hashedPwd)
{
    if(!password_verify($pwd, $hashedPwd)){
        return true;
    }else{
        return false;
    }
}

function get_user(object $pdo, string $email)
{
    return get_user_by_email($pdo, $email);
}

function get_users($pdo)
{
    return get_all_users($pdo);
}

function redirection(object $pdo,string $role)
{
    if($role === "admin"){
        $users = get_users($pdo);
        $_SESSION["users_data"] = $users;
        header("Location: ../data_dashboard.php");
        exit();
    }else{
        header("Location: ../user_dashboard.php");
        exit();
    }
}