<html>
    <head>
        <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        />
        <title>VG Reviews Example detail page</title>
        <link
            rel="stylesheet"
            href="../css/style.css"
        />
    </head>


    <body>
        <?php
        echo 'Registration successful.';
        echo 'Redirecting....';
        sleep(1);
        header('Location: ../login/login.php');
        exit();
        ?>
    </body>
</html>