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
        echo 'Login successful.';
        echo 'Redirecting....';
        header('refresh:2;url=../main/gallery.php');
        exit();
        ?>
    </body>
</html>