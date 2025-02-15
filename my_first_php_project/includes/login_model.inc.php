<?php

declare(strict_types= 1);

function get_email_for_login(object $pdo,string $email)
{
    $query = "select * from users where email = :email;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt ->execute();
    //fetch type is going to be a (PDO::FETCH_ASSOC) which mean associated array so that we can refer to the data inside the database by the name of colum
    $result =  $stmt->fetch(PDO::FETCH_ASSOC);
    //if there is a user it will return an array otherwise it just ganna return boolean
    return $result;
}
function get_all_users($pdo)
{
    $query = "select * from users;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}
function get_user_by_email($pdo, string $email){
    $query = "select id, name, email, role, address, phone from users where email= :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

