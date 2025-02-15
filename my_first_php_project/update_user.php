<?php
    require_once "includes/config_session.inc.php";
    require_once "includes/dbh.inc.php";
    require_once "includes/update_view.inc.php";
    require_once "includes/update_model.inc.php";
    require_once "includes/update_contr.inc.php";
    $id = (int) $_GET['id'];
    $user = get_user($pdo, $id);
    if (isset($_GET["update"])&& $_GET["update"] === "success") {
        $user = get_user($pdo, $id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Edit User</title>

</head>
<body>
    <div class="container">
        <h1 class="form-title">Update User</h1>
        <p>Only fill the field you want to update.</p>
        <form  method="POST" action="includes/update.inc.php?id=<?php echo $user['id'];?>">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" placeholder="<?php echo htmlspecialchars( $user["name"]);?>">
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="<?php echo htmlspecialchars($user['email']);?>">
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="text" name="password" placeholder="password">
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="text" name="confirm_password" placeholder="confirm_password">
                </div>
                <div class="input-group">
                    <label for="role" class="label">Role:</label>
                    <select name="role" id="role">
                        <option value="user" <?php echo $user['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                        <option value="admin" <?php echo $user['role'] == 'admin' ? 'selected': ''; ?>>Admin</option>
                    </select>
                </div>
                <div class="input-group">
                    <i class="fa fa-map-marker"></i>
                    <input type="text" name="address" placeholder="<?php echo htmlspecialchars( $user["address"]);?>">
                </div>
                <div class="input-group">
                    <i class="fa fa-mobile"></i>
                    <input type="tel" name="phone" placeholder="<?php echo htmlspecialchars( $user['phone']);?>">
                </div>
                <input type="submit" class="btn" value="Submit Changes" name="update">
                <hr>
        
            </form>
            <?php
            check_update_errors();
            ?>
            <br>
            <a class="cancel" href="data_dashboard.php">Cancel</a>
        
    </div>
</body>
</html>
