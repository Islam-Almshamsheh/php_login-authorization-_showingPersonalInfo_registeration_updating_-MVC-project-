<?php
declare(strict_types=1);
//TO DISPLAY ERRORS TO THE USER WHILE LOGGING IN
function check_login_errors()
{
    if (isset($_SESSION["login_errors"])) {
        $errors = $_SESSION["login_errors"];

        echo "<br>";
        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . "</p>";
        }

        unset($_SESSION["login_errors"]);
   
    }
}


