<?php
    require_once "includes/config_session.inc.php";
    require_once "includes/edit_view.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Edit Users</title>
</head>
<body>
    <div class="container">
        <h1 class="form-title">Edit User By ID</h1>
        <form action="includes/edit.inc.php" method="post">
            <div class="input-group">
                <i class="fa fa-id-badge"></i>
                <input type="text" name="id" placeholder="id">
            </div>
            <input type="submit" class="btn" value="Edit" name="edit">
        </form>
        <?php
        check_edit_errors();
        ?>
    </div>
        
</body>
</html>
