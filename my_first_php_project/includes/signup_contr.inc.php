<?php
declare(strict_types=1);
function is_input_empty(string $username, string $email, string $password, string $confirm_password)
{
    if(empty($username) || empty($email) || empty($password) || empty($confirm_password)){
        return true;
    }else{
        return false;
    }
}

function is_email_invalid(string $email)
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}
function password_mismatch($pwd, $confirm_password){
    return $pwd !== $confirm_password;
}
function is_email_registered(object $pdo, string $email)
{
    if(get_email($pdo , $email)){
        return true;
    }
    else{
        return false;
    }
}
function create_user(object $pdo, string $name, string $email, string $pwd, string $role,string $address, int $phone)
{
    set_user($pdo, $name, $email, $pwd, $role, $address, $phone);
}


