<?php
    require_once "includes/config_session.inc.php";
    require_once "includes/dbh.inc.php";
    require_once "includes/login_model.inc.php";
    require_once "includes/login_contr.inc.php";

    if (!isset($_SESSION["user_email"])) {
    header("Location: index.php");
    exit();
    }

    $admin = get_user($pdo, $_SESSION["user_email"]);
    $users = get_users($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="userStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    <div class="menu">
        <ul>
            <li class="profile">
                <div class="img-box">
                    <img src="images/user1.png" alt="user-image">
                </div>
                <h2>
                    <?php
                    echo "hello ". htmlspecialchars($admin["name"]);
                    ?>
                </h2>
            </li>
            <li class="center">
                <p>
                <?php
                    echo "Name: <br>".htmlspecialchars($admin["name"])."<br><br>";
                    echo "ID: <br>".htmlspecialchars($admin['id'])."<br>";
                    echo "Address: <br>".htmlspecialchars($admin["address"])."<br><br>";
                    echo "Email: <br>".htmlspecialchars($admin["email"])."<br><br>";
                    echo "Phone: <br>".htmlspecialchars($admin["phone"])."<br><br>";
                    ?>
                </p>
            </li>
            <li class="log-out">
                <a href="index.php">
                    <i class="fas fa-sign-out"></i>
                    <p>Log Out</p>
                </a>
            </li>
        </ul>
    </div>


    <div class="container">
    <h1 class="form-title">
        Users Info
    </h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created_at</th>
                <th>Role</th>
                <th>Address</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php

                    foreach ($users as $user) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($user["id"]) . "</td>";
                        echo "<td>" . htmlspecialchars($user["name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($user["email"]) . "</td>";
                        echo "<td>" . htmlspecialchars($user["created_at"]) . "</td>";
                        echo "<td>" . htmlspecialchars($user["role"]) . "</td>";
                        echo "<td>" .htmlspecialchars($user["address"]) ."</td>";
                        echo "<td>" .htmlspecialchars($user["phone"]) ."</td>";
                        echo "</tr>";
                    }
                ?>
            </tr>
        </tbody>
    </table>
    <div class="btns">
        <form action="register.php" method="post">
            <input type="submit" class="btn" name="register" value="Add User">
        </form>
        <form action="edit_by_id.php" method="post">
            <input type="submit" class="btn" name="edit" value="Edit User">
        </form>
    </div>
    
</div>

</body>
</html>
