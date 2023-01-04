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
        <?php
        session_start();
        require '../../vendor/autoload.php';

        $loader = new Twig\Loader\FilesystemLoader('../templates');
        $twig = new Twig\Environment($loader, [
        'cache' => '../../dist',
        ]);

        include '../templates/navbar.php';    
        ?>
        
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
    <?php include '../components/footer.php'; ?>
</body>

</html>