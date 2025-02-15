<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <div class="container">
    <h1 class="form-title">
            Sing In
    </h1>
    <form method="POST" action="login.php">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email">
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password"  placeholder="Password">
                <i class="fa fa-eye"></i>
            </div>

            <input type="submit" class="btn" name="signin">
        
        </form>
    </div>
</body>
</html>

