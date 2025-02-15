<?php
declare(strict_types=1);
function check_edit_errors(){
    if(isset($_SESSION["edit_by_id_errors"])){
        $errors = $_SESSION["edit_by_id_errors"];
        echo "<br>";
        foreach($errors as $error){
            echo '<p class="form-error">' . $error . "</p>";
        }
        unset($_SESSION["edit_by_id_errors"]);
    }
}
