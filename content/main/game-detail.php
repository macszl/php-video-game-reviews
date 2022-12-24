<!DOCTYPE html>
<html lang="en">
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
    <?php include '../templates/navbar.php'; ?>

    <div class="container">
      <div class="">
        <h2 class="">PLACEHOLDER TITLE TO BE FETCHED FROM DATABASE</h2>
      </div>
      <div class="">
        <div class="">
          <img src="../assets/images/img-01-big.jpg" />
        </div>
        <div class="">
          <div class="">
            <p class="">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
              minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
              in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
              officia deserunt mollit anim id est laborum.
            </p>
            <div>
              <h2 class="">Genres</h2>
              <a
                href="#"
                class="tm-text-primary"
                >Action</a
              >
              <a
                href="#"
                class="tm-text-primary"
                >First Person Shooter</a
              >
              <a
                href="#"
                class="tm-text-primary"
                >Realistic</a
              >
              <a
                href="#"
                class="tm-text-primary"
                >To be fetched from database</a
              >
            </div>
          </div>
        </div>
      </div>

      <div class="">
        <h2 class="">Comments</h2>
      </div>
      <div class="comment-session">
        <div class="post-comment">
          <div class="list-comment">
            <div class="user">
              <div class="user-meta">
                <div class="name">Lorem</div>
                <div class="date">2022-11-10</div>
              </div>
            </div>
          </div>
          <div class="comment-post">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
        </div>

        <div class="post-comment">
          <div class="list-comment">
            <div class="user">
              <div class="user-meta">
                <div class="name">Lorem</div>
                <div class="date">2022-11-10</div>
              </div>
            </div>
          </div>
          <div class="comment-post">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
        </div>

        <div class="comment-box">
          <div class="user">
            <div class="name"></div>
          </div>
          <form
            action=""
            method="post"
          >
            <textarea
              name="comment"
              id=""
              cols="30"
              rows="10"
              placeholder="Your comment"
            >
            </textarea> 
            <button class="comment-submit">Comment</button>
          </form>
        </div>
      </div>

      <div class="">
        <h2 class="">Related games</h2>
      </div>
      <div class="gallery">
        <div class="large-element medium-element small-element xsmall-element">
          <figure class="effect-ming drop-down-item">
            <img src="../assets/images/img-01.jpg" />
            <figcaption class="">
              <h2>PLACEHOLDER VG TITLE TO BE FETCHED FROM DB</h2>
              <a href="game-detail.php">View more</a>
            </figcaption>
          </figure>
          <div class="date-informer">
            <span class="">PLACEHOLDER DATE TO BE FETCHED FROM DB</span>
          </div>
        </div>

        <div class="large-element medium-element small-element xsmall-element">
          <figure class="effect-ming drop-down-item">
            <img src="../assets/images/img-04.jpg" />
            <figcaption class="">
              <h2>PLACEHOLDER VG TITLE TO BE FETCHED FROM DB</h2>
              <a href="game-detail.php">View more</a>
            </figcaption>
          </figure>
          <div class="date-informer">
            <span class="">PLACEHOLDER DATE TO BE FETCHED FROM DB</span>
          </div>
        </div>

        <div class="large-element medium-element small-element xsmall-element">
          <figure class="effect-ming drop-down-item">
            <img src="../assets/images/img-05.jpg" />
            <figcaption class="">
              <h2>PLACEHOLDER VG TITLE TO BE FETCHED FROM DB</h2>
              <a href="game-detail.php">View more</a>
            </figcaption>
          </figure>
          <div class="date-informer">
            <span class="">PLACEHOLDER DATE TO BE FETCHED FROM DB</span>
          </div>
        </div>

        <div class="large-element medium-element small-element xsmall-element">
          <figure class="effect-ming drop-down-item">
            <img src="../assets/images/img-06.jpg" />
            <figcaption class="">
              <h2>PLACEHOLDER VG TITLE TO BE FETCHED FROM DB</h2>
              <a href="game-detail.php">View more</a>
            </figcaption>
          </figure>
          <div class="date-informer">
            <span class="">PLACEHOLDER DATE TO BE FETCHED FROM DB</span>
          </div>
        </div>
      </div>
    </div>
    
    <?php include '../templates/footer.php'; ?>
  </body>
</html>
