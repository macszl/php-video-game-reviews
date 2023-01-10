<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>VG Reviews Main page</title>
    <link
      rel="stylesheet"
      href="../css/style.css"
    />
  </head>

  <body>
      <?php
      
      session_start();
      if(isset($_GET['id'])){
        require '../../vendor/autoload.php';

        $loader = new Twig\Loader\FilesystemLoader('../templates');
        $twig = new Twig\Environment($loader, [
          'cache' => '../../dist',
        ]);
      }

      include '../templates/navbar.php';    

      include '../templates/profile_nick_message.php';
      include '../templates/profile_comments.php';
      include '../templates/profile_favorites.php';
      ?>
      
    <?php include '../components/footer.php'; ?>
  </body>
</html>
