<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>VG Reviews Admin page</title>
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
      if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') {
        include '../components/gallery-upload-panel.php';
      }
      ?>

      
    </div>
    <?php include '../components/footer.php'; ?>
  </body>
</html>
