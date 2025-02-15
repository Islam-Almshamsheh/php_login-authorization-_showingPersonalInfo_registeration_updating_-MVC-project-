<?php
if($_SERVER['REQUEST_METHOD']==="POST"){
    $id=$_POST["id"];
    try{
        require_once "dbh.inc.php";
        require_once "edit_model.inc.php";
        require_once "edit_contr.inc.php";
        require_once "config_session.inc.php";
        $errors =[];
        if(is_input_empty($id)){
            $errors["empty_input"] = "Fill in all fileds!";
        }
        if(is_id_invalid($id)){
            $errors["invalid_id"] = "invalid entered id";
        }
        // Only proceed if no validation errors
        if (empty($errors)) {
            $id_int = (int)$id; // Safe to cast after validation
            $user_to_edit = get_user_by_id($pdo, $id_int);

            if (!$user_to_edit) {
                $errors["id_not_exist"] = "No user found for ID: " . $id;
            }
        }

        if($errors){
            $_SESSION["edit_by_id_errors"] = $errors;
            header("Location: ../edit_by_id.php?edit_user=failed");
            die();
        }
        $_SESSION["user_to_edit"] = [
            "id" =>  $user_to_edit["id"],
            "name" =>  $user_to_edit["name"],
            "email" => $user_to_edit["email"],
            "passward" => $user_to_edit["pwd"],
            "role" => $user_to_edit["role"],
            "address" => $user_to_edit["address"],
            "phone" => $user_to_edit["phone"]
        ];
        header("Location: ../update_user.php?id=".$id);
    }catch(PDOException $e){
        die("Query Failed" . $e->getMessage());
    }
}else{
    header("location: ../data_dashboard.php");
    die();
}
