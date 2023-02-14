<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>VG Reviews Main page Contact page</title>
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

      <div class="filling-test">
        <div class="contact-container">
          <div class="contact-wrapper">
            <p class="contact-header">Hello, my name is Maciej Szlendak!</p>
            <p class="contact-parahraph">I am both the creator and administrator of this website</p>
            <p class="contact-paragraph">Please contact me if any support is needed</p>
            <p class="contact-paragraph">My contact data:</p>
            <p class="contact-paragraph">Email:235989@edu.p.lodz.pl</p>
            <p class="contact-paragraph">URL: github.com/macszl </p>
            <p class="contact-paragraph">Telephone: 123-456-789</p>
          </div>
        </div>
        
        
      <?php include '../components/footer.php'; ?>
    </div>
  </body>
</html>
