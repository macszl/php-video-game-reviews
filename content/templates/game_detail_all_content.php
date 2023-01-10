<?php 
    include '../templates/navbar.php';

    echo '<div class="all-content">';

    include '../templates/game_detail_container.php';

    echo '<h2 class="game-detail-title-ext"style=" text-align: center;">Other games</h2> ';

    include '../templates/gallery_elements.php';

    echo ' <h2 class="game-detail-title-ext"style=" text-align: center;">Comments</h2>';
          

    if (isset($_SESSION['name'])) {
      include '../templates/game_detail_comments.php';
    } else {
      echo '<h2 class="game-detail-title-ext"style=" text-align: center;">Please log in to see the comments</h2>';
    }

    echo '</div>';
?>