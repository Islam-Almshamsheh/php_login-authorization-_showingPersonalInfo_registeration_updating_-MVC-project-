<?php

declare(strict_types=1);

function update_user(object $pdo,array $updates,array $params)
{
    $query = "update users set " . implode(",",$updates) . " where id= :id; ";
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);//we do not use bindParam as it does not take array only one variable at a time
    //testing if the row is updated
       // var_dump($stmt->rowCount());
       // die();
}
function get_user_by_id($pdo,int $id){
    $query = "select id, name, email, role, address, phone from users where id= :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
