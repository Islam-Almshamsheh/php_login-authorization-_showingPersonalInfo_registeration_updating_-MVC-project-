<?php
declare(strict_types=1);//allowing our code to have something called type declarations
function get_email(object $pdo, string $email)
{
    $query = "select email from users where email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt ->bindParam(":email", $email);
    $stmt ->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $name, string $email ,string $pwd, string $role, string $address, int $phone)
{
    $query = "insert into users (name, email, pwd, role, address, phone) values(:name, :email, :pwd, :role, :address, :phone);";
    $stmt = $pdo->prepare($query);
    $options =[
        "cost" => 12,
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT,$options);
    $stmt ->bindParam(":name", $name);
    $stmt ->bindParam(":email", $email);
    $stmt ->bindParam(":pwd", $hashedPwd);
    $stmt ->bindParam(":role", $role);
    $stmt ->bindParam(":address", $address);
    $stmt ->bindParam(":phone",$phone);

    $stmt ->execute();
}

