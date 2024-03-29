<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>VG Reviews</title>
    <link
      rel="stylesheet"
      href="../css/style.css"
    />
  </head>

  <body>
    <?php
    session_start();
    require '../../vendor/autoload.php';

    $loader = new Twig\Loader\FilesystemLoader('../templates');
    $twig = new Twig\Environment($loader, [
      'cache' => '../../dist',
    ]);

    include '../templates/navbar.php';
    include '../components/backdrop_prompt.php';
    echo '<div class="body-content">';
    echo '<h2 class="tm-text-primary">Featured games</h2>';
    include '../templates/gallery_elements_small.php';
    include '../components/feature-cards.php';
    include '../components/index_to_gallery_prompt.php';
    echo ' </div> ';
    ?>

    <?php include '../components/footer.php'; ?>
  </body>
</html>
