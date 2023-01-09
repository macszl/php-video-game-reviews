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
        echo 'Logging out <br>';
        echo 'Redirecting....';
        session_start();
        session_destroy();
        header('refresh:2;url=../main/index.php');
        exit();
        ?>
    </body>
</html>