 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>Sign Up</title>
    <link
      rel="stylesheet"
      href="../css/style.css"
    />
  </head>
<body>
    <div class="filling-body">
        <?php include '../templates/navbar.php'; ?>
        
        <div class="login-form"> 
            <form class="signup" action="../scripts/register_script.php" method="post">
                <label class="label-text">Create account</label>
                <input type="text" name="txt" placeholder="User name" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="pswd" placeholder="Password" required="">
                <a class="signup-link" href="../login/login.php">Already have an account? Log in!</a>
                <button name="submit">Sign up</button>
            </form>
        </div>

        
    </div>
    <?php include '../templates/footer.php'; ?>
</body>
</html>