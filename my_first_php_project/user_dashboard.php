<?php
    require_once "includes/config_session.inc.php";
    require_once "includes/dbh.inc.php";
    require_once "includes/login_model.inc.php";
    require_once "includes/login_contr.inc.php";
    if (!isset($_SESSION["user_email"])) {
        header("Location: index.php");
        exit();
        }
    $user = get_user($pdo, $_SESSION["user_email"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>User_dashboard</title>
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
                    echo "Hello ".htmlspecialchars($user["name"]);
                    ?>
                </h2>
            </li>
            <li>
                <a href="#">
                    <i  class="fa fa-info"></i>
                    <p>info</p>
                </a>
            </li>
            <li class="log-out">
                <a href="index.php">
                    <i class="fas fa-sign-out"></i>
                    <p>Log Out</p>
                </a>
            </li>
        </ul>
    </div>
    <div class="content">
        <div class="title-info">
            <p>dashboard</p>
            <i class="fas fa-chart-bar"></i>
        </div>
        <div class="data-info">
            <div class="box">
                <i class="fas fa-user"></i>
                <div class="data">
                    <p>Name</p>
                    <span>
                        <?php
                        echo htmlspecialchars($user["name"]);
                        ?>
                    </span>
                </div>
            </div>
            <div class="box">
                <i class="fa fa-envelope"></i>
                <div class="data">
                    <p>Email</p>
                    <span>
                        <?php
                        echo htmlspecialchars($user["email"]);
                        ?>
                    </span>
                </div>
            </div>
            <div class="box">
                <i class="fa fa-mobile"></i>
                <div class="data">
                    <p>Phone Number</p>
                    <span>
                        <?php
                        echo htmlspecialchars($user["phone"]);
                        ?>
                    </span>
                </div>
            </div>
            <div class="box">
                <i class="fa fa-map-marker"></i>
                <div class="data">
                    <p>Address</p>
                    <span>
                        <?php
                        echo htmlspecialchars($user["address"]);
                        ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>