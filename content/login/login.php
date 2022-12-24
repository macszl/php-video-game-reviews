<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>Login</title>
    <link
      rel="stylesheet"
      href="../css/style.css"
    />
</head>

<body>
    <div class="filling-body">
        <?php include '../templates/navbar.php'; ?>
        
        <div class="login-form"> 
            <form class="signup" action="../scripts/login_script.php" method="post">
                <label class="label-text">Log in</label>
                <input type="text" name="txt" placeholder="User name" required="">
                <input type="password" name="pswd" placeholder="Password" required="">
                <a class="signup-link"href="../login/register.php">Don't have an account? Sign up!</a>
                <button name="submit">Login</button>
            </form>
        </div>
        
    
    </div>
    <?php include '../templates/footer.php'; ?>
</body>

</html>