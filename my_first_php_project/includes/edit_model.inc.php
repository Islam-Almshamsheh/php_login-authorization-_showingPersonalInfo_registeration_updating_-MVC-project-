<?php

function get_user_by_id($pdo,int $id){
    $query = "select id, name, email, pwd, role, address, phone from users where id= :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

