<?php
declare(strict_types=1);

function check_signup_errors()
{
    if (isset($_SESSION["signup_errors"])) {
        $errors = $_SESSION["signup_errors"];

        echo "<br>";
        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . "</p>";
        }

        unset($_SESSION["signup_errors"]);
    // when we are putting something at url then it's like get method
    } elseif (isset($_GET["signup"]) && $_GET["signup"] === "success") {
         echo "<br>";
         echo '<p>Sign up success!</p>';
    }
}



