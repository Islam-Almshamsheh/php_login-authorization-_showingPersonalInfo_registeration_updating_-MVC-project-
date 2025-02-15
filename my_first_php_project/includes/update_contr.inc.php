<?php
declare(strict_types=1);
require_once "signup_model.inc.php";//i used functions from there
function is_email_invalid(string $email)
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}
function is_email_registered(object $pdo, string $email)
{
    if(get_email_for_login($pdo , $email)){
        return true;
    }
    else{
        return false;
    }
}
function password_mismatch($password, $confirm_password){
    return $password !== $confirm_password;
}

function edit_user(object $pdo, string $name, string $email, string $password, string $role, string $address, string $phone, int $userId)
{
    $updates = [];
    $params = [];//if you did not add placeholder (?) no need to write inside the params anything
    if(!empty($name)){
        $updates[] = "name= :name";
        $params[":name"] = $name;
    }
    if(!empty($email)){
        $updates[] = "email= :email";
        $params [":email"]= $email;
    }
    if(!empty($password)){
        $options =[
            "cost" => 12,
        ];
        $hashedPwd = password_hash($password, PASSWORD_BCRYPT,$options);
        $updates[] = "pwd= :password";
        $params[":password"] =$hashedPwd;
    }
    if (!empty($role)) {
        $updates[] = "role = :role";
        $params[':role'] = $role;
    }
    if(!empty($address)){
        $updates[] = "address= :address";
        $params[":address"] = $address;
    }
    if(!empty($phone)){
        $updates[] = "phone= :phone";
        $params[":phone"] = $phone;
    }
    if (empty($updates)) {
        return false;
    }
    $params[":id"]= $userId;
    update_user($pdo, $updates, $params);
}
function get_user(object $pdo, int $id){
    return get_user_by_id($pdo, $id);
}