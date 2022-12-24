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
    <?php include '../templates/navbar.php'; ?>

    <div class="backdrop-image">
      <div class="welcome-header">
        <div class="backdrop-text">
          Discover new video games. <br />
          Rate your enjoyment. <br />
          Tell your friends what is good.
        </div>
        <a class="backdrop-button" href="../login/register.php">Get started, it's free!</a>
      </div>
    </div>
    <div class="body-content">
      <h2 class="tm-text-primary">Featured games</h2>
      <div class="featured-games">
        <figure class="effect-ming drop-down-item">
          <img
            src="../assets/images/img-01-big.jpg"
            alt="img01"
          />
          <figcaption>
            <h2>
              <span>Featured Game</span>
            </h2>
            <a href="../main/game-detail.php">View more</a>
          </figcaption>
        </figure>

        <figure class="effect-ming drop-down-item">
          <img
            src="../assets/images/img-01-big.jpg"
            alt="img01"
          />
          <figcaption>
            <h2>
              <span>Featured Game</span>
            </h2>
            <a href="../main/game-detail.php">View more</a>
          </figcaption>
        </figure>

        <figure class="effect-ming drop-down-item">
          <img
            src="../assets/images/img-01-big.jpg"
            alt="img01"
          />
          <figcaption>
            <h2>
              <span>Featured Game</span>
            </h2>
            <a href="../main/game-detail.php">View more</a>
          </figcaption>
        </figure>

        <figure class="effect-ming drop-down-item">
          <img
            src="../assets/images/img-01-big.jpg"
            alt="img01"
          />
          <figcaption>
            <h2>
              <span>Featured Game</span>
            </h2>
            <a href="../main/game-detail.php">View more</a>
          </figcaption>
        </figure>
      </div>
      <div class="vgreviews-features">
        <div class="feature">
          <div class="feature-panel">
            <img src="../assets/icons/star.svg" class="icon"/>
            <h4 class="tm-text-primary">Rate your games</h4>
          </div>
        </div>
        <div class="feature">
          <div class="feature-panel">
            <img src="../assets/icons/heart.svg" class="icon"/>
            <h4 class="tm-text-primary">Mark your favourites</h3>
          </div>
        </div>
        <div class="feature">
          <div class="feature-panel">
            <img src="../assets/icons/write.svg" class="icon"/>
            <h4 class="tm-text-primary">Write a review</h4>
          </div>
        </div>
        <div class="feature">
          <div class="feature-panel">
            <img src="../assets/icons/lightbulb.svg" class="icon"/>
            <h4 class="tm-text-primary">Find new games</h4>
          </div>
        </div>
      </div>
      <div class="prompt-text">Write and share reviews. Share your video-game life.</div>
      <div class="prompt-text-small">
        <a
          class="prompt-text-link"
          href="gallery.php"
          >Click here</a
        >
        to see our latest additions to the catalog.
      </div>
    </div>

    <?php include '../templates/footer.php'; ?>
  </body>
</html>
