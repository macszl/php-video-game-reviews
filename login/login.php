<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../content/css/style.css">
</head>

<body>
    <div class="filling-body">
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="../content/index.html">
                    VGReviews.com - The best video game reviews site there is!
                </a>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="navbar-small-txt" href="../content/admin.html">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-small-txt" href="../content/contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-small-txt" href="../login/login.php">Login</a>
                    </li>
                </ul>


                
            </div>
            
        </nav>
        <div class="login-page">
            <form class="login-form" action="login.php" method="post">

                <h2 class="login-heading">
                    Please log in.
                </h2>

                <?php if (isset($_GET['error'])) { ?>

                    <p class="error"><?php echo $_GET['error']; ?></p>

                <?php } ?>

                <label class="login-label">User Name</label>

                <input class="login-prompt" type="text" name="uname" placeholder="User Name"><br>

                <label class="login-label">Password</label>

                <input class="login-prompt" type="password" name="password" placeholder="Password"><br> 

                <button type="submit">Login</button>

                </form>
        </div>
        <div class="filling-test"></div>
        <footer class="bottom-part">
            <div class="container">
                <div class="">
                    <div class="">
                        <h3 class="tm-text-primary">Our Links</h3>
                        <ul class="">
                            <li><a href="#">Advertise</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    
                </div>

            </div>
        </footer>
    </div>
</body>

</html>