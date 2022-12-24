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
      <?php include '../templates/navbar.php'; ?>
      <h2 class="gallery-title">
        Welcome ${nick}! Check out your favourites and your latest reviews.
      </h2>

      

      <div class="gallery-profile">
        <h3>Favourites</h3>
        <div class="gallery-item">
          <a
            class="gallery-picture-link"
            href="imagelink1"
          >pic</a>
          <div class="item-info">
            <p class="name"> VIDEOGAME1 </p>
            <p class="date">${nick} FAVORITED THIS AT ${date}</p>
            <img src="../assets/icons/heart.svg" class="icon"/>
          </div>
        </div>

        <div class="gallery-item">
          <a
            class="gallery-picture-link"
            href="imagelink2"
          >pic</a>
          <div class="item-info">
            <p class="name"> VIDEOGAME2 </p>
            <p class="date">${nick} FAVORITED THIS AT ${date}</p>
            <img src="../assets/icons/heart.svg" class="icon"/>
          </div>
        </div>

        <div class="gallery-item">
          <a
            class="gallery-picture-link"
            href="imagelink3"
          >pic</a>
          <div class="item-info">
            <p class="name"> VIDEOGAME3 </p>
            <p class="date">${nick} FAVORITED THIS AT ${date}</p>
            <img src="../assets/icons/heart.svg" class="icon"/>
          </div>
        </div>
      </div>

      
      <div class="gallery-profile">
        <h3>Reviews</h3>
        <div class="gallery-item">
          <a
            class="gallery-picture-link"
            href="imagelink1"
          ></a>
          <div class="item-info">
            <p class="name"> VIDEOGAME1 </p>
            <p class="date">${nick} REVIEWED THIS AT ${date}</p>
            <p class="comment-post">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>

        <div class="gallery-item">
          <a
            class="gallery-picture-link"
            href="imagelink1"
          ></a>
          <div class="item-info">
            <p class="name"> VIDEOGAME1 </p>
            <p class="date">${nick} REVIEWED THIS AT ${date}</p>
            <p class="comment-post">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>

        <div class="gallery-item">
          <a
            class="gallery-picture-link"
            href="imagelink1"
          ></a>
          <div class="item-info">
            <p class="name"> VIDEOGAME1 </p>
            <p class="date">${nick} REVIEWED THIS AT ${date}</p>
            <p class="comment-post">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
      </div>

    <?php include '../templates/footer.php'; ?>
  </body>
</html>
