<?php
    require_once "includes/config_session.inc.php";
    require_once "includes/signup_view.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
        <div class="container">
            <h1 class="form-title">Insert User</h1>
            <form method="POST" action="includes/signup.inc.php">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" placeholder="name">
                </div>

                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="email">
                </div>

                <div class="input-group password">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="password">
                    <i id="eye" class="fa fa-eye"></i>
                </div>

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="confirm_password" placeholder="confirm password">
                </div>
                <div class="input-group">
                    <label for="role" class="label">Role:</label>
                    <select id="role" name="role" required>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <div class="input-group">
                    <i class="fa fa-map-marker"></i>
                    <input type="text" name="address" placeholder="address">
                </div>
                <div class="input-group">
                    <i class="fa fa-mobile"></i>
                    <input type="tel" name="phone" placeholder="phone">
                </div>

                <input type="submit" class="btn" value="Inset New User" name="signup">
            </form>

            <?php
            check_signup_errors(); //as it going to show data to users it will be written in the view file
            ?>
            <hr>
            <br>
            <a class="cancel" href="data_dashboard.php">Cancel</a>
        </div>
</body>

</html>