<?php
function check_update_errors()
{
    if(isset($_SESSION["update_errors"])){
        $errors = $_SESSION["update_errors"];
        echo "<br>";
        foreach ($errors as $error){
            echo '<P class="form-error">' . $error . "</p>";
        }
        unset($_SESSION["update_errors"]);
    }elseif (isset($_GET["update"]) && $_GET["update"] === "success") {
    echo "<br>";
    echo '<p>Updated Successfully!</p>';
}
}
