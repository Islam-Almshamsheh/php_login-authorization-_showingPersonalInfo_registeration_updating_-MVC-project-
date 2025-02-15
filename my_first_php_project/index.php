<?php
  require_once "includes/config_session.inc.php";
  require_once "includes/signup_view.inc.php";
  require_once "includes/login_view.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1 class="form-title">
            Sing In
        </h1>
        <form method="POST" action="includes/login.inc.php">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email"  placeholder="Email">
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password"  placeholder="Password">
                <i class="fa fa-eye"></i>
            </div>
            
            <input type="submit" class="btn" value="Sign IN" name="signin">
            
        </form>

        <?php
        check_login_errors();
        ?>
    </div>
</body>
</html>
