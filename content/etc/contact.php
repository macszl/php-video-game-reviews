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
        <div class="">
          <div class="">
            <div class="">
              <h2 class="tm-text-primary">Our Address</h2>
              <p class="">
                Quisque eleifend mi et nisi eleifend pretium. Duis porttitor accumsan arcu id rhoncus. Praesent fermentum venenatis ipsum, eget
                vestibulum purus.
              </p>
              <p class="">
                Nulla ut scelerisque elit, in fermentum ante. Aliquam congue mattis erat, eget iaculis enim posuere nec. Quisque risus turpis, tempus
                in iaculis.
              </p>
              <address class="">
                120-240 Fusce eleifend varius tempus<br />
                Duis consectetur at ligula 10660
              </address>
              <ul class="">
                <li>
                  <a
                    href="#"
                    class="tm-text-gray"
                  >
                    <i class=""></i>
                    Email: 235989@edu.p.lodz.pl
                  </a>
                </li>
                <li>
                  <a
                    href="#"
                    class="tm-text-gray"
                  >
                    <i class=""></i>
                    Tel: 012-345-6789
                  </a>
                </li>
                <li>
                  <a
                    href="#"
                    class="tm-text-gray"
                  >
                    <i class=""></i>
                    URL: brak
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <?php include '../components/footer.php'; ?>
    </div>
  </body>
</html>
